<?php

namespace App\Http\Controllers;

use App\Models\Kereta;
use App\Models\Penumpang;
use App\Models\Transaksi;
use App\Models\User;
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
        $role = Auth::user()->role;

        if ($role == 'admin') {
            return view('layouts.admin.dashboard',
                [
                    'penumpang' => User::where('role', 'penumpang')->count(),
                    'kereta' => Kereta::all()->count(),
                    'boking' => Transaksi::all()->count(),

                ]);
        } else {
            return view('layouts.penumpang.jadwal', [
                'jadwal' => Kereta::all(),
            ]);
        }
    }

    public function dashboard()
    {
        $penumpang = DB::table('users')->where('role', 'penumpang')->count();
        $kereta = DB::table('keretas')->count();
        $boking = DB::table('transaksis')->count();
        // $pendapatan = DB::table('#')->count();
        // $pengguna = DB::table('penggunas')->count();
        // dd($pegawai, $kegiatan, $uraian, $pengguna);
        return view('layouts.admin.dashboard', compact('penumpang', 'kereta', 'boking'));
    }

    // public function laporan()
    // {
    //     $penumpang = Penumpang::with('users')->get();
    //     // $kegiatan = Kegiatan::all();

    //     $transaksi = Transaksi::where('user_id', auth()->user()->id)->get();
    //     // $laporan = DB::table('users')->where('role', 'penumpang')->get();
    //     return view('layouts.transaksi.index', compact('transaksi', 'penumpang'));
    // }

    public function dataJadwal()
    {
        $jadwal = Kereta::all();
        return view('layouts.penumpang.jadwal', compact('jadwal'));
    }

    public function laporanTiket()
    {
        $laporan = DB::table('users')->where('role', 'penumpang')->get();
        $penumpang = Penumpang::all();
        $transaksi = Transaksi::all();
        return view('layouts.admin.laporan', compact('laporan', 'penumpang', 'transaksi'));
    }

    public function getTiket($id)
    {
        $tiket = Transaksi::findOrFail($id);
        return view('layouts.transaksi.ticket', compact('tiket'));

        //mengambil data dan tampilan dari halaman laporan_pdf
        //data di bawah ini bisa kalian ganti nantinya dengan data dari database
        // $tiket = PDF::loadview('layouts.transaksi.tiket', compact('tiket'));
        // //mendownload laporan.pdf
        // return $tiket->download('Tiket.pdf');
    }
}
