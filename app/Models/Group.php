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
		'user_id'
	];


}
