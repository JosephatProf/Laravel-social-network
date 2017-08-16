<?php 
namespace Afreshysoc;
use Afreshysoc\Models\User;
use Illuminate\Database\Eloquent\Model;

class Activities extends Model {

	protected $table = 'activities';

	protected $fillable = [
		'groups', 
		'adverts',
		'interests',
		'user_id',
	];

}
