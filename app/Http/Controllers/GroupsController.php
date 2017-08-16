<?php 
namespace Afreshysoc\Http\Controllers;
use Illuminate\Http\Request;
use Afreshysoc\Group;
use Afreshysoc\Activities;
use Afreshysoc\Models\User;
use Afreshysoc\Http\Requests;
use Afreshysoc\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

class GroupsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function groupHome()
	{
		return view('profile.group');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function postGroup(Request $request)
	{
		if (Auth::check()) {
			$user_id = Auth::user()->getUserId();
			$this->validate($request, [
					
					'g_name'=>'required|max:40',
					'members'=>'required'
				]);
			$member_one = 1;
			$file = $request->file('g_image');
			$filename = time().'-'.$file->getClientOriginalName();
			$path = $file->move('public/images/groups',$filename);
			Group::create([
					'group_name'=>$request->input('g_name'),
					'group_image'=>$filename,
					'members'=>$request->input('members'),
					'user_id'=>$user_id,
					'joined'=> $member_one,
				]);
			Activities::create([
				'groups'=>$request->input('g_name'),
				'user_id'=>$user_id,
			]);

			// $group->save($group);
			return redirect()->route('profile.group')->with('info','Group Created Successfully');
		}
		return view('home');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function getJoin($groupname)
	{
		//check if the group clicked has not been deleted
		$join_g = Group::where('group_name',$groupname)->first();
		if (!$join_g) {
			return redirect()
			->route('home')
			->with('info','Sorry. The group you requested to join do not exist or has been deleted');
		}
		//protect the user to join a group if he/she has already joined
		if (Auth::user()->id == $join_g->user_id) {
			return redirect()->route('home')->withInfo('You already joined the group');	
		}
		//initialize the group class
		$join = new Group();
		$output = $join->joinGroup($join_g);
		// dd($output);
		return redirect()->route('home')->withInfo('You joined the group');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function showGroups($id)
	{
		 return view('home', ['group' => Group::findOrFail($id)]);
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
