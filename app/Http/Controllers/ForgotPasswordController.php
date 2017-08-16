<?php namespace Afreshysoc\Http\Controllers;

use Afreshysoc\Http\Requests;
use Afreshysoc\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ForgotPasswordController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getresetPassword()
	{
		return view('auth.password');
	}
	public function resetPassword(Request $request){
		$this->validate($request, [
				
				'email'=>'required',
			]);
		return redirect()->back()->with('info','Email sent. Please check your inbox to obtain link');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
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
