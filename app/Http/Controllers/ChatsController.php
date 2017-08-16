<?php 
namespace Afreshysoc\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Requests;
use Illuminate\Http\Request;
use Afreshysoc\Models\User;
use Afreshysoc\Models\Chat;
use Illuminate\Http\Response;
use Afreshysoc\Http\Controllers\Controller;
use \Input as Input;
use Illuminate\Support\Facades\Auth;
class ChatsController extends Controller {


	public function displayChats()
	{
		
		if (Auth::check()) {
			
			//show on the my friends
			$friends = Auth::user()->friends();
			// $data['data'] = Chat::orderBy('id', 'desc')->get();
			
			
			return  view('profile.chats')
					->with('friends',$friends);


		}
		return view('home');
		
		
	}
	//send a message
	public function postMessage(Request $request,$friendId)
	{
		$this->validate($request, [
				'message'=>'required|max:1000',

			]);
		$friends = Auth::user()->friends();
		$user_id = Auth::user()->getUserId();
		$f_id = User::find($friendId)->id;

		if (!$friends) {
			return redirect()->back()->withInfo('You are not friends. No chats allowed without being friends');
		}
		
		// dd($f_id);
		if (!$f_id) {
			return redirect()->back()->withInfo('Friend not found');
		}else{
			$sent = Chat::create([
				'message' => $request->input('message'),
				'friend_id'=>$f_id,
				'user_id'=>$user_id,
				]);
			// $sent = Chat::replies()->save($text);

			if ($sent) {
				return redirect()->back()
					->with('friends',$friends);
			}else{
				return redirect()->back()
					->with('friends',$friends)
					->with('info','Message not sent');
			}
		}
		
		
	}
	public function getReplyMessage($friendId)
	{
		
		$friends = Auth::user()->friends();
		//find friend selected
		$friend = Chat::notReply()->find($friendId);
		$f_id = User::find($friendId)->id;
		if (!$friends) {
			return redirect()->back()->withInfo('You are not friends. No chats allowed without being friends');
		}
		$data['data'] = Chat::where('friend_id','=',$f_id)->get();
			//get receiver meesages
		// $receiver['receiver'] = User::where('id','=',$f_id)->get();
		if (count($data) > 0) {
			//display messages
			return  view('profile.chat',$data)
					->with('friends',$friends);

		}else{
			//if no messages display null with friends
			return  view('profile.chat',$data)
					->with('friends',$friends);
				
		}
		return redirect()->back()
				->with('friends',$friends)
				->with('friend',$friend);
		
	}
	
}
