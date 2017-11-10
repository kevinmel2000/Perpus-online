<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Buku;
use Auth;
use Session;
use Illuminate\Support\Facades\Hash;

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
            'judul'                 =>'required|min:4| max:18',
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

}
