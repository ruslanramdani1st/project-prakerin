<?php

namespace App\Http\Controllers;

use App\Models\Kereta;
use App\Models\Penumpang;
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
        return view('layouts.penumpang.index', compact('penumpang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.penumpang.create', [
            'datakereta' => Kereta::all(),
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
            'kereta_id' => 'required',
            'jumlah_penumpang' => 'required',
            'kelas' => 'required',
        ], ['kereta_id.required' => 'Armada Harus Di isi!.',
            'jumlah_penumpang.required' => 'Jumlah Penumpang Harus Di isi!.',
            'kelas.required' => 'Kelas Harus Di isi!.']);

        $penumpang = new Penumpang();
        $penumpang->user_id = auth()->user()->id;
        $penumpang->tanggal_berangkat = $request->tanggal_berangkat;
        $penumpang->kereta_id = $request->kereta_id;
        $penumpang->jumlah_penumpang = $request->jumlah_penumpang;
        $penumpang->kelas = $request->kelas;
        $kereta = Kereta::findOrFail($request->kereta_id);
        $penumpang->total = $kereta->harga * $request->jumlah_penumpang;
        $penumpang->save();
        return redirect()->route('penumpang.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penumpang  $penumpang
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $penumpang = Penumpang::findOrFail($id);
        return view('layouts.penumpang.show', compact('penumpang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penumpang  $penumpang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $penumpang = Penumpang::findOrFail($id);
        return view('layouts.penumpang.edit', [
            'datakereta' => kereta::all(),
        ], compact('penumpang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penumpang  $penumpang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'unique:users',
            'tanggal_berangkat' => 'required|date',
            'kereta_id' => 'required',
            'jumlah_penumpang' => 'required',
            'kelas' => 'required',
        ], ['kereta_id.required' => 'Armada Harus Di isi!.',
            'jumlah_penumpang.required' => 'Jumlah Penumpang Harus Di isi!.',
            'kelas.required' => 'Kelas Harus Di isi!.']);

        $penumpang = Penumpang::findOrFail($id);
        $penumpang->user_id = auth()->user()->id;
        $penumpang->tanggal_berangkat = $request->tanggal_berangkat;
        $penumpang->kereta_id = $request->kereta_id;
        $penumpang->jumlah_penumpang = $request->jumlah_penumpang;
        $penumpang->kelas = $request->kelas;

        // Menjumlahkan data dari penumpang ke tabel lain
        $kereta = Kereta::findOrFail($request->kereta_id);
        $penumpang->total = $kereta->harga * $request->jumlah_penumpang;
        $penumpang->save();

        return view('layouts.penumpang.show', compact('penumpang'));
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
        return redirect()->route('penumpang.index');
    }
}
