<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = DB::table('transaksis')
            ->join('users', 'transaksis.user_id', '=', 'user_id')
            ->join('penumpangs', 'transaksis.penumpang_id', '=', 'penumpang_id')
            ->select('users.name', 'penumpangs.tanggal_berangkat', 'transaksis.bank_pengirim', 'transaksis.bank_tujuan', 'transaksis.nama_rekening', 'transaksis.nomor_rekening', 'transaksis.proses_pembayaran', 'transaksis.bukti_pembayaran')
            ->get();

        // make response JSON
        return response()->json([
            'success' => true,
            'massage' => 'Semua Data Transaksi',
            'data' => $transaksi,
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

        // make response JSON
        return response()->json([
            'success' => true,
            'massage' => 'Data store Transaksi',
            'data' => $transaksi,
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaksi = Transaksi::findOrFail($id);

        // make response JSON
        return response()->json([
            'success' => true,
            'massage' => 'Data show Transaksi',
            'data' => $transaksi,
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaksi = Transaksi::findOrFail($id);

        // make response JSON
        return response()->json([
            'success' => true,
            'massage' => 'Data edit Transaksi',
            'data' => $transaksi,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
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

        // make response JSON
        return response()->json([
            'success' => true,
            'massage' => 'Data update Transaksi',
            'data' => $transaksi,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();

        // make response JSON
        return response()->json([
            'success' => true,
            'massage' => 'Hapus Data Transaksi',
            'data' => $transaksi,
        ], 200);
    }
}
