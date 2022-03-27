<?php

namespace App\Http\Controllers;

use App\Models\Kereta;
use App\Models\Penumpang;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = Transaksi::where('user_id', auth()->user()->id)->get();
        $penumpang = Penumpang::all();
        return view('layouts.transaksi.index', compact('transaksi', 'penumpang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.transaksi.create', [
            'penumpang' => Penumpang::all(),
            'kereta' => Kereta::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'unique:users',
            'penumpang_id' => 'required',
            'bank_pengirim' => 'required',
            'bank_tujuan' => 'required',
            'nama_rekening' => 'required|string|max:50',
            'nomor_rekening' => 'required',
            'jumlah_transfer' => 'required',
            'bukti_pembayaran' => 'required|image|file|max:2048',
        ], ['bank_pengirim.required' => 'Bank Pengirim Harus Di isi!.',
            'bank_tujuan.required' => 'Bank Tujuan Harus Di isi!.']);

        $transaksi = new Transaksi();
        $transaksi->user_id = auth()->user()->id;
        $transaksi->penumpang_id = $request->penumpang_id;
        $transaksi->bank_pengirim = $request->bank_pengirim;
        $transaksi->bank_tujuan = $request->bank_tujuan;
        $transaksi->nama_rekening = $request->nama_rekening;
        $transaksi->nomor_rekening = $request->nomor_rekening;
        $transaksi->jumlah_transfer = $request->jumlah_transfer;
        if ($request->file('bukti_pembayaran')) {
            $transaksi->bukti_pembayaran = $request->file('bukti_pembayaran')->store('transaksi');
        }
        $transaksi->save();
        return redirect()->route('transaksi.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        return view('layouts.admin.detailLaporan', compact('transaksi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        return view('layouts.admin.verifikasiLaporan', compact('transaksi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'proses_pembayaran' => 'required',
        ], ['proses_pembayaran.required' => 'Verifikasi Proses Pembayaran Harus Di isi!.']);

        $transaksi = Transaksi::findOrFail($id);
        $transaksi->proses_pembayaran = $request->proses_pembayaran;
        $transaksi->save();
        return view('layouts.admin.detailLaporan', compact('transaksi'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Transaksi::findOrFail($id)->delete();
        return redirect()->route('transaksi.index');
    }
}
