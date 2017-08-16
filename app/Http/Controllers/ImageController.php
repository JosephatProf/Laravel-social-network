<?php 
namespace Afreshysoc\Http\Controllers;

// use Afreshysoc\Http\Requests;
use Afreshysoc\Http\Controllers\Controller;
use \Input as Input;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller {

	/**
	 * Create view file.
	 *
	 * @return Response
	 */
	public function uploads()
	{
		return view('profile.upload');
	}
	public function imageUpload(Request $request)
	{
		// $user = Auth::user();
		// $user->update();
		if (Input::hasFile('image')) {
			$file = $request->file('image');
			$filename = $file->getClientMimeType();
			if ($file) {
				Storage::disk('local')->put($filename,File::get($file));
				return redirect()->route('profile.upload');
			}
		}else{
			dd('no image found');
		}
		
		
		// if (Input::hasFile('mypic')) {
			
		// 	// $file = Input::file('mypic');
		// 	$file->move(public_path('uploads'), $file->getClientOriginalName());
		// 	echo 'uploaded <br />';
		// 	echo '<img src="uploads/'. $file->getClientOriginalName() .'" />';
		// }else{
		// 	echo 'not uploaded';
		// }
		
	}
	public function getUserImage($filename){
		$file = Storage::disk('local')->get($filename);
		return new Response($file, 200);
	}

}
