<?php 
namespace Afreshysoc\Models;
use Afreshysoc\Models\Chat;
use Afreshysoc\Models\Status;
use Afreshysoc\Group;
use Afreshysoc\Models\Like;
use Afreshysoc\Models\Activities;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;


class User extends Model implements AuthenticatableContract
 {

	use Authenticatable;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'username', 
		'email', 
		'password',
		'first_name',
		'last_name',
		'location',
		'profile_image'
	];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 
		'remember_token'
	];
	public function getName(){
		if ($this->first_name && $this->last_name ) {
			return "{$this->first_name} {$this->last_name}";
		}
		if ($this->first_name) {
			return $this->first_name;
		}
		return null;
	}
	public function getFirstNameOrUsername(){
		return getName()? : $this->username;
	}
	public function getUserId(){
		return $this->id;
	}
	public function getNameOrUsername(){
		return $this->first_name ?: $this->username;
	}
	public function getProfileImage(){
		return $this->profile_image;
	}
	public function getAvatarUrl(){
		return "https://www.gravatar.com/avatar/{{ md5($this->email) }}?d=mm&s=40";
	}

	//get relationship between user and status
	public function statuses()
	{
		return $this->hasMany('Afreshysoc\Models\Status',
			'user_id');
	}
	public function messages()
	{
		return $this->hasMany('Afreshysoc\Models\Chat','user_id');
	}
	public function likes()
 	{
 		return $this->hasMany('Afreshysoc\Models\Like','user_id');
 	}
	public function friendsOfMine()
	{
		return $this->belongsToMany('Afreshysoc\Models\User','friends','user_id', 'friend_id');
	}
	public function friendsOf()
	{
		return $this->belongsToMany('Afreshysoc\Models\User','friends','friend_id','user_id');
	}
	public function friends()
	{
		//get friends from both users otherwise only one member will notice that he is friends with the other while the opposite is wrong
		return $this->friendsOfMine()->wherePivot('accepted',true)->get()->merge($this->friendsOf()->wherePivot('accepted',true)->get());
	}
	public function friendRequests()
	{
		//fucntion to display friend requests
		return $this->friendsOfMine()->wherePivot('accepted',false)->get();
	}
	public function notMyFriends()
	{
		//get user who are not friends
		return $this->friendsOfMine()->wherePivot('accepted',false)->get()->merge($this->friendsOf()->wherePivot('accepted',false)->get());
		
	}
	public function friendRequestsPending()
	{
		return $this->friendsOf()->wherePivot('accepted',false)->get();
	}
	// public function pendingMessagesFriend()
	// {
	// 	return $this->friendsOf()->wherePivot('accepted',false)->get();
	// }
	public function hasFriendRequestsPending( User $user)
	{
		return (bool)$this->friendRequestsPending()->where('id',$user->id)->count();
	}
	public function hasFriendRequestsRecieved( User $user)
	{
		return (bool)$this->friendRequests()->where('id',$user->id)->count();
	}
	public function addFriend(User $user)
	{
		$this->friendsOf()->attach($user->id);
	}
	public function deleteFriend(User $user)
	{
		//deletes only surrent cursor selected friend
		$this->friendsOf()->detach($user->id);
		//deletes any frien selected
		$this->friendsOfMine()->detach($user->id);
	}
	public function acceptFriendRequest(User $user)
	{
		$this->friendRequests()->where('id',$user->id)->first()
		->pivot->update([
				'accepted'=>true
			]);
	}
	public function isFriendsWith(User $user)
	{
		return (bool)$this->friends()->where('id',$user->id)->count();
	}
	

 	public function hasLikedStatus(Status $status)
 	{
 		//refactored
 		return (bool)$status->likes->where('user_id',$this->id)->count();
 		// return (bool)$status->likes
 		// ->where('likeable_id',$status->id)
 		// ->where('likeable_type',get_class($status))
 		// ->where('user_id',$this->id)
 		// ->count();
 	}
 	
}
