<?php 
namespace Afreshysoc\Http\Controllers;
use Illuminate\Http\Request;
use Afreshysoc\Models\User;
use Afreshysoc\Models\Status;
use \Input as Input;
use Illuminate\Support\Facades\Auth;
class StatusController extends Controller 
{

	public function postStatus(Request $request)
	{
		$this->validate($request, [
				'status'=>'required|max:1000',

			]);
		Auth::user()->statuses()->create([
				'body' => $request->input('status'),
				'identity'=>1,
			]);
		return redirect()
		->route('home')
		->with('info','status posted');
	}
	//post status with images
	public function getImages()
	{
		return view('profile.images');
	}
	public function postStatusWithImage(Request $request)
	{
		if (Input::hasFile('post-image')) {
			// echo 'uploaded <br />';
			$file = $request->file('post-image');
			$filename = time().'-post-'.$file->getClientOriginalName();
			$mime = $request->file('post-image')->getClientOriginalExtension();
			if ($mime == 'mp4') {
				$path = $file->move('public/images/status_images',$filename);
				Auth::user()->statuses()->create([
					'body' => $filename,
					'identity'=>3,
				]);
				return redirect()->route('home');
			}else{
				$path = $file->move('public/images/status_images',$filename);
				Auth::user()->statuses()->create([
					'body' => $filename,
					'identity'=>2,
				]);
				return redirect()->route('home');
			}

			// $path = $file->move('public/images/status_images',$filename);
			
			// echo '<img src="images/status_images/'. $filename .'" />';
			
		}else{
			echo 'not uploaded';
		}
		
	}
	public function postReply(Request $request, $statusId)
	{
		$this->validate($request,[
			"reply-{$statusId}" => 'required|max:1000',
		],[
			'required' => 'The reply body is required.'
		]);
		$status = Status::notReply()->find($statusId);
		//check if reply exists
		if (!$status) {
			return redirect()->route('home');
		}
		//check if users are friends else no reply, second checks if its our own reply soo we can reply to our posts
		if (!Auth::user()->isFriendsWith($status->user) && Auth::user()->id !== $status->user->id) {
			return redirect()->route('home');
		}
		$reply = Status::create([
				'body' => $request->input("reply-{$statusId}"),
			])->user()->associate(Auth::user());
		$status->replies()->save($reply);
		return redirect()->back();
	}
	public function getLike($statusId)
	{
		$status = Status::find($statusId);
		if (!$status) {
			return redirect()->route('home')->withinfo('id not found');
		}

		if (!Auth::user()->isFriendsWith($status->user)) {
			return redirect()->route('home');
			// ->withinfo('you are not friends ');
		}
		if (Auth::user()->hasLikedStatus($status)) {
			// dd('has already liked');
			return redirect()->back();
		}
		$like = $status->likes()->create([]);
		Auth::user()->likes()->save($like);

		return redirect()->back();
	}
}
