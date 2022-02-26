<?php

namespace App\Http\Controllers;

use App\Models\Kereta;
use App\Models\Transaksi;
use App\Models\Penumpang;
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
        // $penumpang = Penumpang::where('penumpang_id', auth()->user()->id)->get();
        return view('layouts.transaksi.index', compact('transaksi'));
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
            'kereta' => Kereta::all()
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
        // dd($request->all());
        $request->validate([
            'user_id' => 'unique:users',
            'penumpang_id' => 'unique:penumpangs',
            'bank_pengirim' => 'required',
            'bank_tujuan' => 'required',
            'nama_rekening' => 'required|string|max:50',
            'nomor_rekening' => 'required',
            'jumlah_transfer' => 'required',
            'bukti_pembayaran' => 'required|image|file|max:2048',
        ],['bank_pengirim.required' => 'Bank Pengirim Harus Di isi!.',
        'bank_tujuan.required' => 'Bank Tujuan Harus Di isi!.']);

        $transaksi = new Transaksi();
        $transaksi->user_id = auth()->user()->id;
        $transaksi->penumpang_id = auth()->user()->id;
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
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
