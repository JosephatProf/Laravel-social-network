<?php 
namespace Afreshysoc\Http\Controllers;
use Illuminate\Http\Request;
use Afreshysoc\Models\User;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller {

	public function getSignUp()
	{
		return view('auth.signup');
	}
	public function getresetPassword()
	{
		return view('auth.password');
	}
	public function postSignUp(Request $request)
	{
		$this->validate($request, [
				'first_name'=>'required|max:25',
				'last_name'=>'required|max:25',
				'email'=>'required|unique:users|email|max:255',
				'username'=>'required|unique:users|alpha_dash|max:25',
				'password'=>'required|min:6|max:12|confirmed',
				'password_confirmation'=>'required|min:6|max:12'
			]);
		User::create([
				'first_name'=>$request->input('first_name'),
				'last_name'=>$request->input('last_name'),
				'email'=>$request->input('email'),
				'username'=>$request->input('username'),
				'password'=>bcrypt($request->input('password')),
			]);
		return redirect()->route('home')->with('info','Successfully registered. Now you can login');
	}
	public function getSignin(){
		return view('auth.signin');
	}
	public function postSignin(Request $request){
			$this->validate($request, [
				
				'email'=>'required',
				'password'=>'required'
			]);
			if(!Auth::attempt($request->only(['email','password']),$request->has('remember'))){
				return redirect()->back()->with('info','Invalid combination of credentials');
			}
			return redirect()->route('home');
	}
	public function getSignout(){
		Auth::logout();
		return redirect()->route('home');
	}
	
}
