<?php namespace Afreshysoc\Models;
use Afreshysoc\Models\User;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model {

	use Authenticatable;

	protected $table = 'chats';

	protected $fillable = [
		'message', 
		'friend_id',
		'user_id',
	];

	public function scopeNotReply($query)
	{
		return $query->whereNull('friend_id');
	}
	public function replies()
	{
		//relate reply to a specific message with specific friend
		return $this->hasMany('Afreshysoc\Models\Chat','friend_id');
	}
}
