<?php namespace Afreshysoc\Http\Controllers;

use Afreshysoc\Http\Requests;
use Afreshysoc\Http\Controllers\Controller;
use Afreshysoc\Models\Admin;
use Afreshysoc\Models\User;
use Afreshysoc\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	
	public function index()
	{
		return view('admin.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getLogin()
	{
		return view('admin.login');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function postLogin(Request $request)
	{

		
		//validate details
		$this->validate($request, [
				'email'=>'required',
				'password'=>'required',
				
			]);

		// if(!Admin::attempt($request->only(['email','password']))){
		// 	return redirect()->route('admin.login')->with('info','Login success');
			
		// }
		return redirect()->route('admin.index')->with('info','Success with ..');;
		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function showUsers()
	{
		//get all users from database
		$users = User::all();
		if (!$users) {
			return view('admin.users')->with('alert','No records found');
		}

		return view('admin.users')
				->with('users',$users);
	}
	public function showGroups()
	{
		//get all users from database
		$groups = Group::all();
		if (!$groups) {
			return view('admin.groups')->with('alert','No records found');
		}

		return view('admin.groups')
				->with('groups',$groups);
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
