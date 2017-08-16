<?php 
namespace Afreshysoc\Http\Controllers;
use Afreshysoc\Models\Status;
use Afreshysoc\Models\Chat;
use Afreshysoc\Group;
use Afreshysoc\Models\Advertise;
use Auth;
class HomeController extends Controller {

	public function index()
	{
		if (Auth::check()) {
			//icnlude not reply function to avoid normal status posts
			$statuses = Status::notReply()->where(function($query){
				return $query->where('user_id',Auth::user()->id)->orWhereIn('user_id',Auth::user()->friends()->lists('id'));
			})
			->orderBy('created_at','desc')
			->paginate(10);
			//show on the timeline friends
			$friends = Auth::user()->friends();
			$groups = Group::all();
			$advert = Advertise::all();
			$suggested = Auth::user()->notMyFriends();
			//get friend requests
			$requests = Auth::user()->friendRequests();
			return view('timeline.index')
			->with('statuses',$statuses)
			->with('requests',$requests)
			->with('groups',$groups)
			->with('friends',$friends)
			->with('advert',$advert)
			->with('suggested',$suggested);
		}
		return view('home');
	}
	

}
