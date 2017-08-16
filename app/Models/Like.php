<?php 
namespace Afreshysoc\Models;
use Afreshysoc\Models\User;
use Afreshysoc\Models\Status;
use Illuminate\Database\Eloquent\Model;


class Like extends Model 
 {
 	protected $table = 'likeable';
 	//protected $with = ['likeable'];

 	public function likeable()
 	{
 		return $this->morphTo();
 	}
 	public function user()
 	{
 		return $this->belongsTo('Afreshysoc\Models\User','user_id');
 	}
 	
 }
 //user_id foreign key
 //many poylymorphic relations