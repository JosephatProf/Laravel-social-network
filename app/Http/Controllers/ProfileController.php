<?php 
namespace Afreshysoc\Http\Controllers;
use \Input as Input;
use Illuminate\Http\Requests;
use Afreshysoc\Models\User;
use Afreshysoc\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
class ProfileController extends Controller 
{

	public function getProfile($username){
		//check if user is available
		$user = User::where('username',$username)->first();
		if (!$user) {
			abort(404);
		}
		$statuses = $user->statuses()->notReply()->get();

		return view('profile.index')
			->with('user',$user)
			->with('statuses', $statuses)
			->with('authUserIsFriend', Auth::user()->isFriendsWith($user));
	}
	public function getEdit()
	{
		return view('profile.edit');
	}
	public function postEdit(Request $request)
	{
		// dd($request);

		$this->validate($request, [
			'first_name'=>'alpha|max:50',
			'last_name'=>'alpha|max:50',
			'location'=>'max:20',
			
			]);
		
		if (Input::hasFile('mypic')) {
			// $path = Storage::('mypic', $request->file('mypic'));
			$user = Auth::user();
			$file = $request->file('mypic');
			// $filename = $user->username.'-profile'.$user->id.'.jpg';
			$mainfile = $file->getClientOriginalName();
			$filename = $file->move('public/images/profile', $file->getClientOriginalName());
			if ($file) {
				// Storage::disk('local')->put($filename,File::get($file));
				// $fullpath = Storage::put($filename,File::get($file));

				Auth::user()->update([
					'first_name'=>$request->input('first_name'),
					'last_name'=>$request->input('last_name'),
					'location'=>$request->input('location'),
					'profile_image'=>$mainfile,
				]);
				return redirect()->route('profile.edit')->with('info','Your profile has been updated');
				
			}else{
				echo 'Not uploaded';
			}
			
		}else{
			echo 'No image was selected';
		}
		
		
		
	}
	public function uploads()
	{
		return view('profile.upload');
	}
	public function imageUpload(Request $request)
	{
		// $this->validate($request, [
		// 	'image' => 'required|image|max:3000|mimes:jpeg,jpg,bmp,png'
		// 	]);
		if (Input::hasFile('image')) {
			
			$user = Auth::user();
			$file = $request->file('image');
			$filename = $user->username.'-'.$user->id.'.jpg';
			if ($file) {
				Storage::disk('local')->put($filename,File::get($file));
				return redirect()->route('profile.edit');

			}else{
				echo 'Not uploaded';
			}
			
		}else{
			echo 'No image was selected';
		}
		
	
		
	}
	public function getUserImage($filename){
		$file = Storage::disk('local')->get($filename);
		return new Response($file, 200);
	}

}

