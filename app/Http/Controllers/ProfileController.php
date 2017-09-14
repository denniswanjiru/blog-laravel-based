<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Image;
use Session;

class ProfileController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function getProfile(){
    	return view('user.profile');
    }

    public function updateAvatar(Request $request){
        $this->validate($request, [
            'avatar' => 'sometimes|image',
            'description' => 'min:10',
            ]);

        $user = Auth::user();

    	if ($request->hasFile('avatar')) {
    		$avatar = $request->file('avatar');
    		$filename =time(). '.' .$avatar->getClientOriginalExtension();
    		Image::make($avatar)->resize(121, 121)->save(public_path('/images/uploads/avatars/'. $filename));
      }
    		$user->avatar = $filename;
        $user->description = $request->description;

    		$user->save();

    	  Session::flash('success', 'Your profile was successfully updated!');
        return redirect()->route('user.profile')->withUser($user);

    }
}
