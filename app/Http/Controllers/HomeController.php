<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.dashboard');
    }

    public function ubah(){
        return view('pages.ubahpassword');
    }

    public function update(request $request,$id){
        $user = User::where('id', $id)->update([
                'password'=> bcrypt($request->password)
            ]);
        return back()->with('pesan','Password Berhasil Di Ubah');
    }
}
