<?php 
namespace Afreshysoc\Models;
use Afreshysoc\Models\Like;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;


class Status extends Model 
 {
 	protected $table = 'statuses';
 	//protected $with = ['likeable'];

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
	'body',
	'identity'

	];
	public function user()
	{
		return $this->belongsTo('Afreshysoc\Models\User',
			'user_id');
	}
	public function scopeNotReply($query)
	{
		return $query->whereNull('parent_id');
	}
	public function replies()
	{
		//relate reply to a specific status
		return $this->hasMany('Afreshysoc\Models\Status','parent_id');
	}
	public function likes()
 	{
 		return $this->morphMany('Afreshysoc\Models\Like','likeable');

 	}
 }