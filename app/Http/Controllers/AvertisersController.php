<?php namespace Afreshysoc\Http\Controllers;

use Afreshysoc\Http\Requests;
use Afreshysoc\Http\Controllers\Controller;
use Afreshysoc\Models\User;
use Afreshysoc\Models\Advertise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Input as Input;
class AvertisersController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$user_id = Auth::user()->getUserId();
		$advert = Advertise::where('user_id',$user_id)->get();

		return view('profile.advert')->with('advert',$advert);
	}
	public function getAvailableAds()
	{
		$user_id = Auth::user()->getUserId();
		$advert = Advertise::where('user_id',$user_id)->get();

		return view('profile.advert')->with('advert',$advert);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function postAdverts(Request $request)
	{
		$this->validate($request, [
				'adname'=>'required|max:50',
				'validkey'=>'required|max:20',
				'period'=>'required',
				
			]);
		$media = $request->file('adImage');
		$username = Auth::user()->getNameOrUsername();
		$user_id = Auth::user()->getUserId();
		if ($media) {
			//store adverts details
			$admKey = 'KEM481OP7';
			$userkey = $request->input('validkey');
			if ($userkey !== $admKey) {
				return redirect()->back()->withInfo('Please obtain payment key from the Admin');
			}else{
				$file = time().'-'.$media->getClientOriginalName();
				$filename = $media->move('public/images/adverts', $file);
				//send data
				$adv = Advertise::create([
						'advert_name'=>$request->input('adname'),
						'advert_owner'=>$username,
						'valid_key'=>$request->input('validkey'),
						'advert_media'=>$file,
						'period'=>$request->input('period'),
						'advert_website'=>$request->input('website'),
						'user_id'=>$user_id
					]);
				return redirect()->back()->withInfo('Success');
			}
			
			
		}else{
			return redirect()->back()->withInfo('Media not selected');
		}
		
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
