<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{
    // public function __construct(){
    //   $this->middleware('guest');
    // }

    public function getLogin(){
      return view('auth.adminLogin');
    }

    public function postLogin(Request $request)
    {
      //validate the user credentials
      $this->validate($request, [
        'email' => 'required|email',
        'password' => 'required|min:6',
      ]);

      //Attempt to login the user
      if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
        //If successful redirect to the intended password_get_info
        return redirect()->intended(route('admin.dashboard'));
      }

      //if unsuccessful redirect back
      return redirect()->back()->withInput($request->only('email', 'remember'));
    }
}
