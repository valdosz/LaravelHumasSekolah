<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Humas;
use Carbon;


class HumasController extends Controller
{

    public function tampil(){

        $data = Humas::latest()->SimplePaginate(5);
        return view('pages.tampil', compact('data'));
    }

    public function input(){
        return view('pages.input');
    }

    public function dash()
    {
        return view('pages.dashboard');
    }

    public function hapus($id)
    {
        Humas::destroy($id);
        return back()->with('pesan', 'Data Berhasil Dihapus');
    }

    public function save(Request $req)
    {
    	$this->validate($req, [
    		'nama' => 'required',
    		'keperluan' => 'required',
            'status' => 'required',
            'kontak' => 'required | max:13',
            'foto' => 'required',
    	]);

        $reqfoto = $req->foto;
        $foto      = substr($reqfoto, strpos($reqfoto, ',') + 1);
        $dekod       = base64_decode($foto);
        $nama_file = "img-".time().rand(11111,99999).".png";
        $folder = public_path('images/foto/');

        $fp = fopen($folder.$nama_file,'w');
        fwrite($fp, $dekod);
        fclose($fp);

        $tgl = Carbon\Carbon::now()->format('Y-m-d');

    	Humas::create([
    		'nama' => $req->nama,
    		'keperluan' => $req->keperluan,
            'status' => $req->status,
            'kontak' => $req->kontak,
            'tgl_kunjungan' => $tgl,
            'foto' => $nama_file,
    	]);

    	return back()->with('pesan', 'Data Berhasil Terinput');
    }

    public function keluar($id)
    {
        Humas::where('id',$id)
        ->update(
            ['exit_at'=>date("Y-m-d H:i:s")]
        );
        return back()->withMessage("Terimakasih :(");
    }
}
