<?php

namespace App\Http\Controllers;

use App\Models\Penumpang;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $penumpang = DB::table('users')->where('role', 'penumpang')->get();
        return view('layouts.admin.index', compact('penumpang'));
    }

    public function jurusan()
    {
        $asal = DB::table('asals')->get();
        $tujuan = DB::table('tujuans')->get();
        return view('layouts.admin.index', compact('user'));
    }

    public function role()
    {
        $role=Auth::user()->role;

        if($role=='admin') {
            return view('layouts.admin.dashboard');
        } else {
            return view('layouts.user.dashboard');
        }
    }

    public function dashboard()
    {
        $pengguna = DB::table('users')->where('role', 'pengguna')->count();
        $kereta = DB::table('keretas')->count();
        // $pendapatan = DB::table('#')->count();
        // $pengguna = DB::table('penggunas')->count();
        // dd($pegawai, $kegiatan, $uraian, $pengguna);
        return view('layouts.admin.dashboard', compact('pengguna','kereta'));
    }

    public function laporan()
    {
        $penumpang = Penumpang::with('users')->get();
        $transaksi = Transaksi::all();
        return view('layouts.admin.laporan', compact('penumpang','transaksi'));
    }

}
