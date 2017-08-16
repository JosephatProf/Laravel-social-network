<?php 
namespace Afreshysoc\models;
use Illuminate\Auth\Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model{

	use Notifiable;

	protected $table = 'admin';
	
	protected $guard = 'admin';

	protected $fillable = [
		'username', 
		'password',
		'email', 
		'messages',
		'job_title'
	];
	protected $hidden = [
		'password', 
		'remember_token'
	];


}
