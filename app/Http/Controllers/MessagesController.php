<?php
namespace Afreshysoc\Http\Controllers;
use Illuminate\Http\Requests;
use Afreshysoc\Models\message;
use Afreshysoc\Models\User;
use Afreshysoc\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
class MessagesController extends Controller
{
	public function viewMessage()
    {

        return view('profile.messages');
    }
    public function getMessage()
    {
        $user = User::where('username',$username)->first();
        if (!$user) {
            return redirect()
            ->route('home')
            ->with('info','User not found');
        }
    }

}