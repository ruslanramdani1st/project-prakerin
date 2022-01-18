<?php

namespace App\Http\Controllers;

use App\Models\Kereta;
use App\Models\User;
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
            return view('layouts.admin.dashboard',
            [
                'penumpang' => User::where('role', 'penumpang')->count(),
                'kereta' => Kereta::all()->count(),
                // 'uraian' => Uraian::all()->count(),
                // 'pengguna' => Pengguna::all()->count(),
            ]);
        } else {
            return view('layouts.user.dashboard',
            [
                // 'kegiatan' => Kegiatan::all()->count(),
                // 'uraian' => Uraian::all()->count(),
                // 'pengguna' => Pengguna::all()->count(),
            ]);
        }
    }

    public function dashboard()
    {
        $penumpang = DB::table('users')->where('role', 'penumpang')->count();
        $kereta = DB::table('keretas')->count();
        // $pendapatan = DB::table('#')->count();
        // $pengguna = DB::table('penggunas')->count();
        // dd($pegawai, $kegiatan, $uraian, $pengguna);
        return view('layouts.admin.dashboard', compact('penumpang','kereta'));
    }

    public function dashboardPenumpang()
    {
        return view('layouts.user.dashboard');
    }

    public function laporan()
    {
        $penumpang = Penumpang::with('users')->get();
        $transaksi = Transaksi::all();
        return view('layouts.admin.laporan', compact('penumpang','transaksi'));
    }

    public function dataJadwal()
    {
        $jadwal = Kereta::all();
        return view('layouts.penumpang.jadwal', compact('jadwal'));
    }



    // public function harga()
    // {
    //     $harga = DB::table('keretas')->where('harga')->get();
    //     $k_eksekutif = 20000;
    //     $k_bisnis = 15000;
    //     $k_ekonomi = 10000;
    //     $k_premium = 5000;

    //     // PERHITUNGAN
    //     $kelas_kesekutif = $harga + $k_eksekutif;
    //     $kelas_bisnis = $harga + $k_bisnis;
    //     $kelas_ekonomi = $harga + $k_ekonomi;
    //     $kelas_premium = $harga + $k_premium;
    //     return view('layouts.transaksi.show', compact('kelas_kesekutif','kelas_bisnis','kelas_ekonomi','kelas_premium'));
    // }

}
