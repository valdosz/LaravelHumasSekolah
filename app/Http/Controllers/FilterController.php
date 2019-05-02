<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Humas;
use Illuminate\Support\Facades\DB;

class FilterController extends Controller
{
   public function tanggal()
    {
    	return view('filtertanggal');
    }

    public function orang_tua()
    {
    	$ortu = Humas::all()->where('status', 'Orangtua');

		return view('pages.tampilorangtua', compact('ortu'));
    }

    public function alumni()
    {
        $alumni = Humas::all()->where('status', 'Alumni');

        return view('pages.tampilalumni', compact('alumni'));
    }

    public function pengunjung()
    {
        $pengunjung = Humas::all()->where('status', 'Kunjungan');

        return view('pages.tampilkunjungan', compact('pengunjung'));
    }

    public function data_dash(){
        $alumni1 = DB::table('humas')->where('status','=','Alumni')->count();
        $orangtua1 = DB::table('humas')->where('status','=','Orangtua')->count();
        $pengunjung1 = DB::table('humas')->where('status','=','Kunjungan')->count();
        $seluruhtamu = DB::table('humas')->count();
        return view('pages.dashboard', compact('alumni1','orangtua1','pengunjung1','seluruhtamu'));   
    }

    public function hari_ini(){
        $today = Humas::whereRaw('DATE(created_at) = CURDATE() AND exit_at')->latest()->get();
        return view('pages.tampiltoday', compact('today'));
    }

    public function datatamu(){
        $datatamu = Humas::whereRaw('DATE(created_at) = CURDATE() AND exit_at IS NULL')->latest()->get();
        return view('pages.datatamu', compact('datatamu'));
    }

    public function usertamu(){
        $userdata = Humas::whereRaw('DATE(created_at) = CURDATE()')->latest()->get();
        return view('user.userdata', compact('userdata'));
    }

    public function pertanggal(request $request){
        $start = $request->start;
        $end = $request->end;
        // $data = DB::select('SELECT * FROM $table WHERE $whereparam BETWEEN $start AND $end');

        $data = Humas::whereBetween('created_at',[$start,$end])->get();

        $tahun = substr($start,0,4);
        $bulan = substr($start,4,4);
        $hari = substr($start,8,8);

        $tahun2 = substr($end,0,4);
        $bulan2 = substr($end,4,4);
        $hari2 = substr($end,8,8);

        $d_start = $tahun.$bulan.$hari;
        $d_end = $tahun2.$bulan2.$hari2;

        return view('pages.tampilpertanggal',['data'=>$data,'tgl_masuk'=>$start,'tgl_out'=>$end,'start'=>$d_start,'end'=>$d_end]);
    }
}
