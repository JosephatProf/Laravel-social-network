<?php 
namespace Afreshysoc;
use Afreshysoc\Models\User;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;

class Group extends Model {

	use Authenticatable;

	protected $table = 'groups';

	protected $fillable = [
		'group_name', 
		'members',
		'posts', 
		'group_image',
		'user_id',
		'joined',
	];
	//implement a function  to get number of counts in a group
	public function getGroupsMembers(Group $group){
		$group->where('id',$this->id)->count();
	}
	public function joinGroup(Group $group)
	{
		//join group function
		
		// $addmember = 2;
		$group->where('id',$this->id)
		->update([
				'joined'=>2,
				'user_id'=>1
			]);
		// dd($res);
	}

}
