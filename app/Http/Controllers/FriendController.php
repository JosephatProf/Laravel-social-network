<?php 
namespace Afreshysoc\Http\Controllers;

use Afreshysoc\Http\Requests;
use Afreshysoc\Http\Controllers\Controller;
use Afreshysoc\Models\User;
use Illuminate\Http\Request;
use Auth;
class FriendController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		$friends = Auth::user()->friends();
		$requests = Auth::user()->friendRequests();
		return view('friends.index')
			->with('friends',$friends)
			->with('requests',$requests);
	}
	public function getIndexForTm()
	{
		$friends = Auth::user()->friends();
		$requests = Auth::user()->friendRequests();
		return view('timeline.index')
			->with('friends',$friends)
			->with('requests',$requests);
	}

	/**
	 * Show adding friend request
	 *
	 * @return Response
	 */
	public function getAdd($username)
	{
		//check if user found
		$user = User::where('username',$username)->first();
		if (!$user) {
			return redirect()
			->route('home')
			->with('info','User not found');
		}
		//do not send friend request to self
		if (Auth::user()->id === $user->id) {
			return redirect()->route('home');		
		}
		//check if there is any pending friend request
		if (Auth::user()->hasFriendRequestsPending($user) || $user->hasFriendRequestsPending(Auth::user())) {
			return redirect()
			->route('profile.index',['username'=>$username])
			->withInfo('Friend request pending');
		}
		if (Auth::user()->isFriendsWith($user)) {
			return redirect()->route('profile.index',['username'=>$user->username])
			->with('info','You are already friends.');
		}
		Auth::user()->addFriend($user);
		return redirect()
		->route('profile.index',['username'=>$username])
		->withInfo('Friend request sent');
	}

	/**
	 * Store a newly accepted friend request
	 *
	 * @return Response
	 */
	public function getAccept($username)
	{
		//check if user found
		$user = User::where('username',$username)->first();
		if (!$user) {
			return redirect()
			->route('home')
			->with('info','User not found');
		}
		if (!Auth::user()->hasFriendRequestsRecieved($user)) {
			return redirect()->route('home'); 
		}
		Auth::user()->acceptFriendRequest($user);
		return redirect()
		->route('profile.index',['username'=>$username])
		->withInfo('Friend request accepted');
	}

	/**
	 * delete friends
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function postDelete($username)
	{
		//check if user found
		$user = User::where('username',$username)->first();

		if (!Auth::user()->isFriendsWith($user)) {
			return redirect()->back();
		}

		Auth::user()->deleteFriend($user);

		return redirect()->back()->with('info','Friend deleted.');
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
