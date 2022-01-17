<?php

namespace App\Http\Controllers;

use App\Models\Asal;
use  App\Models\Tujuan;
use App\Models\Penumpang;
use App\Models\Kereta;
use Illuminate\Http\Request;

class PenumpangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penumpang = Penumpang::where('user_id', auth()->user()->id)->get();
        $kereta = Kereta::all();
        return view('layouts.penumpang.index', compact('penumpang','kereta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.penumpang.create', [
            'dataasal' => Asal::all(),
            'datatujuan' => Tujuan::all(),
            'datakereta' => Kereta::all()
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
            'tanggal_berangkat' => 'required|date',
            'jumlah_penumpang' => 'required',
            'kereta_id' => 'required',
            'asal_id' => 'required',
            'tujuan_id' => 'required',
            'kelas' => 'required',
        ],['kereta_id.required' => 'Armada Harus Di isi!.'],
        ['asal_id.required' => 'Kota Asal Harus Di isi!.'],
        ['tujuan_id.required' => 'Kota Tujuan Harus Di isi!.']);

        $penumpang = new Penumpang();
        $penumpang->user_id = auth()->user()->id;
        $penumpang->tanggal_berangkat = $request->tanggal_berangkat;
        $penumpang->jumlah_penumpang = $request->jumlah_penumpang;
        $penumpang->kereta_id = $request->kereta_id;
        $penumpang->asal_id = $request->asal_id;
        $penumpang->tujuan_id = $request->tujuan_id;
        $penumpang->kelas = $request->kelas;
        $penumpang->save();
        return redirect()->route('transaksi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penumpang  $penumpang
     * @return \Illuminate\Http\Response
     */
    public function show(Penumpang $penumpang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penumpang  $penumpang
     * @return \Illuminate\Http\Response
     */
    public function edit(Penumpang $penumpang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penumpang  $penumpang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penumpang $penumpang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penumpang  $penumpang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Penumpang::findOrFail($id)->delete();
        return redirect()->route('transaksi.index');
    }
}
