<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\User;
use App\Buku;
use Auth;
use Session;

use App\Transaksi;
use Illuminate\Support\Facades\Hash;

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

    public function postUpdateProfile(Request $request){

      //$user_id = Auth::user()->id;
      //$user    = User::find($user_id);

        $this->validate($request, [
            'name'                 =>'required| max:18',
            'phone'                =>'required|numeric',
            'email'                =>'email|required|exists:users',
            'oldpassword'          =>'required|min:4',
            'newpassword'          =>'required|min:4',
            'confirmpassword'      =>'required|same:newpassword',
            'imagePath'            =>'required|url'
        ]);

        
        if (Hash::check($request->oldpassword, Auth::user()->password)) {

            Auth::user()->name         = $request->input('name');
            Auth::user()->phone        = $request->input('phone');
            Auth::user()->email        = $request->input('email');
            Auth::user()->imagePath    = $request->input('imagePath');

            Auth::user()->password     = Hash::make($request->newpassword);
        
            Auth::user()->save();
            $message = "profile anda berhasil diubah";

            return redirect()->route('user.profile')->with(['success_message'=> $message]);
        }

      else{
        $message= 'Pasword lama anda salah';
        return redirect()->route('user.profile')->with(['error_message'=> $message]);
      }
    }

    public function getBuku(){
      $databuku = Buku::all();
      return view('User.daftar_buku_user')->with(['databuku' => $databuku]);
    }

   public function getPinjamBuku($book_id){
      $buku = Buku::find($book_id);
      $current_time = Carbon::now()->addDays(4);
      return view('User.halaman_pinjam')->with(['buku' => $buku , 'date' => $current_time]);
   }

   public function postPinjamBuku($book_id, Request $request){
     $buku            = Buku::find($book_id);
     $user_id         = Auth::user()->id;
     $status          = 0;
     $current_time    = Carbon::now();

     $transaksi = new Transaksi();
     $transaksi->tgl_peminjaman =  $current_time;
     $transaksi->id_buku = $book_id;
     $transaksi->id_peminjam= $user_id;
     $transaksi->status = $status;

     $buku->status = 0;

     $buku->save();
     $transaksi->save();
     return redirect()->route('user.buku');
   }

   public function getTransaksi(){
     $user_id   = Auth::user()->id;
     $transaksi = DB::table('transaksis')->where('id_peminjam',$user_id)->get();
     $buku      = Buku::all();
     $user      = User::find($user_id);

     return view('User.transaksi_user')->with(['transaksi'=>$transaksi,'buku'=> $buku]);
   }
}
