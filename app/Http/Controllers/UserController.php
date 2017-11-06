<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Auth;
use Session;
class UserController extends Controller
{
    public function postSignup(Request $request){
    		$this->validate($request,[
    		'email'    => 'email|required|unique:users',
    		'password' => 'required|min:4',
    		'name' 	   => 'required|min:4'
    	]);

    	$user= new User([
   			'email'=> $request->input('email'),
   			'name' => $request->input('name'),
   			'password' => bcrypt($request->input('password')),
   			'type' => 'user'
   		]);
   		$user->save();

   		Auth::login($user);
      $pesan = 'berhasil signup';
       if (Session::has('oldUrl')){
           $oldUrl = Session::get('oldUrl');
           Session::forget('oldUrl');
           return redirect()->to($oldUrl);
       }
      return redirect()->route('user.profile')->with(['message'=> $pesan]);
    }

    public function getLogout(){
    		Auth::logout();
        $pesan='anda berhasil logout';
        return redirect()->route('home')->with(['message'=> $pesan]);
    }

    public function getHome(){
        return view('Index.index');
    }

    public  function getProfile(){
      return view('User.user_profile');
    }

    public function getLogin(){
      return view('Index.login');
    }

    public function postLogin(Request $request){
       $this->validate($request, [
            'email'     => 'email|required',
            'password'  => 'required|min:4'
         ]);

      if( (Auth::attempt(['email'=> $request->input('email'),'password'=>$request->input('password')])) && (Auth::user()->type=='user')   )
         {
             if (Session::has('oldUrl')){
                 $oldUrl = Session::get('oldUrl');
                 Session::forget('oldUrl');
                 return redirect()->to($oldUrl);
             }
         return redirect()->route('user.profile')->with(['message'=>'anda berhasil login']); //bila login sukses ke halaman profile
         }

      else if((Auth::attempt(['email'=> $request->input('email'),'password'=>$request->input('password')])) && (Auth::user()->type=='admin') ){
             if (Session::has('oldUrl')){
                 $oldUrl = Session::get('oldUrl');
                 Session::forget('oldUrl');
                 return redirect()->to($oldUrl);
             }
         return redirect()->route('admin.profile')->with(['message'=>'anda berhasil login sebagai admin']);
      }

         else{
             return redirect()->back()->with(['error_login_message' => 'Email dan Password anda tidak valid']); //kalo gagal refresh ulang 
         }
    }
}
