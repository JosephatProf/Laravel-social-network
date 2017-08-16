<?php 
namespace Afreshysoc\Models;

use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model 
 {
 	protected $table = 'chat_messages';
 	public function user()
	{
		return $this->belongsTo('AfreshySoc\Models\User',
			'user_id');
	}
	public function replies()
	{
		//relate reply to a message sent
		return $this->hasMany('AfreshySoc\Models\ChatMessage','parent_id');
	}
 }