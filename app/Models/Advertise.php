<?php namespace Afreshysoc\Models;
use Afreshysoc\Models\User;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;

class Advertise extends Model {

	use Authenticatable;

	protected $table = 'adverts';

	protected $fillable = [
		'advert_owner', 
		'advert_name',
		'amount_paid',
		'user_id',
		'period',
		'valid_key',
		'advert_media',
		'advert_website'
	];
	public function getAdverts()
	{
		return $this->advert_name;
	}
	//function to approve payment
	public function approvePayment(Advertise $ad)
	{
		
	}

}
