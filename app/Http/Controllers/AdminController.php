<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Auth;
use Session;
class AdminController extends Controller
{
    //
    public function getProfile(){
    	$user_id = Auth::user()->id;
    	$user    = User::find($user_id);
    	return view('Admin.admin_profile')->with(['user'=> $user]);
    }

    public function getBookTables(){
    	return view('Admin.admin_buku');
    }

    public function postUpdateAdmin(Request $request){
		$user_id = Auth::user()->id;
    	$user    = User::find($user_id);

    	if ( ( $user->password == bcrypt($request->input('oldpassword')) ) && ($request->input('oldpassword')!= '') ) {
    		# code...
    	    $user->password = bcrypt($request->input('newpassword'));
    	    $user->name     = $request->input('name');
    	    $user->phone    = $request->input('phone');
    	    $user->email    = $request->input('email');

    	    $user->save();
    	    $message = "profile anda berhasil diubah";

    	    return redirect()->route('admin.profile')->with(['success_message'=> $message]);
    	}
    	else{
    		$message= 'Pasword lama anda salah';
    		return redirect()->route('admin.profile')->with(['error_message'=> $message]);
    	}


    }
}
