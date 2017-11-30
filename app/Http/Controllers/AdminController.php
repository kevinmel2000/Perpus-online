<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\User;
use App\Buku;
use App\denda;
use App\Transaksi;
use Auth;
use Session;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class AdminController extends Controller
{
    //
    public function getProfile(){
    	$user_id = Auth::user()->id;
    	$user    = User::find($user_id);
    	return view('Admin.admin_profile')->with(['user'=> $user]);
    }

    public function getBookTables(){
        $databuku = Buku::all();
    	return view('Admin.admin_buku')->with(['databuku'=> $databuku]);
    }

    public function postUpdateAdmin(Request $request){

        
		$user_id = Auth::user()->id;
    	$user    = User::find($user_id);

        $this->validate($request, [
            'name'                 =>'required| max:18',
            'phone'                =>'required|numeric',
            'email'                =>'email|required|exists:users',
            'oldpassword'          =>'required|min:4',
            'newpassword'          =>'required|min:4',
            'confirmpassword'      =>'required|same:newpassword'
        ]);

        
        if (Hash::check($request->oldpassword, $user->password)) {

            $user->name     = $request->input('name');
            $user->phone    = $request->input('phone');
            $user->email    = $request->input('email');

            $user->password = Hash::make($request->newpassword);
        
            $user->save();
            $message = "profile anda berhasil diubah";

            return redirect()->route('admin.profile')->with(['success_message'=> $message]);
        }

    	else{
    		$message= 'Pasword lama anda salah';
    		return redirect()->route('admin.profile')->with(['error_message'=> $message]);
    	}


    }


    public function getCreateBook(){
        return view('admin.tambahbuku');
    }


    public function postCreateBook(Request $request){
        $this->validate($request, [
            'judul'                 =>'required|min:4| max:80',
            'gambar'                =>'required|url',
        ]);

        $buku = new Buku();
        $buku->judul = $request['judul'];
        $buku->gambar = $request['gambar'];
        $buku->status = 1;

        $buku->save();
        
        return redirect()->route('admin.book_tables');
    }

    public function getDeleteBook($book_id)
   {
    $buku = Buku::where('id', $book_id)->first();
    $buku->delete();
    $message = "Buku berhasil di hapus";
    return redirect()->route('admin.book_tables')->with(['success_message'=> $message]);
   }

   public function getEditBook($book_id)
   {
    $buku = Buku::find($book_id);
    $message= 'Buku anda berhasil di update';

    return view('admin.editbuku')->with(['buku'=>$buku]);
   }

   public function postEditBook($book_id, Request $request){
    $buku= Buku::find($book_id);
     $this->validate($request, [
            'judul'                 =>'required|min:4| max:80',
            'gambar'                =>'required|url'
        ]);
     $buku->judul = $request['judul'];
     $buku->gambar = $request['gambar'];
     $buku->save();
     $message = 'buku anda berhasil di edit';

     return redirect()->route('admin.book_tables')->with(['success_message' => $message]);
   }

   public function getLihatUser(){
    $user = User::all();
        return view('admin.daftaruser')->with(['user'=> $user]);
   }

   public function modalDenda(Request $request){
        $id = $request['ID'];
        $user = User::find($id);
        $nama= $user->nama;

        return response()->json(['message'=> $nama]);
   }

   public function getuserDetail($user_id){
     $transaksi = DB::table('transaksis')->where('id_peminjam',$user_id)->get();
     $denda =DB::table('dendas')->where('id_user',$user_id)->get();
     $id = $user_id;
     $buku = Buku::all();
     $user= User::find($user_id);

     return view('admin.detail_user')->with(['transaksi'=>$transaksi, 'denda'=> $denda, 'id'=>$id, 'buku'=> $buku, 'user'=>$user]);
   }

   public function postTransaksiSelesai($id_transaksi){
    $transaksi = Transaksi::find($id_transaksi);
    $current_time    = Carbon::now();
    $transaksi->tgl_pengembalian = $current_time;
    $transaksi->status = 1;
    $id_buku = $transaksi->id_buku;
    $buku= Buku::find($id_buku);
    $buku->status = 1;
    $buku->save();
    $start = $transaksi->tgl_peminjaman;

   
    $date = Carbon::parse($start);
    $now = Carbon::now();

    $diff = $date->diffInDays($now);

    $transaksi->length= $diff;
    $transaksi->save();

    if ($diff>3) {
        # code...
        $denda= New denda();
        $denda->id_buku = $id_buku;
        $denda->id_user = $transaksi->id_peminjam;
        $denda->jumlah_hari = $diff-3;
        $denda->save();
    }
    return redirect()->back();
   }

}
