<?php

namespace App\Http\Controllers;

use App\Models\Kereta;
use App\Models\Asal;
use App\Models\Tujuan;
use Illuminate\Http\Request;

class KeretaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kereta = Kereta::all();
        return view('layouts.kereta.index', compact('kereta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.kereta.create', [
            'dataasal' => Asal::all(),
            'datatujuan' => Tujuan::all()
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
            'nomor_polisi' => 'required|string|max:20',
            'nama_kereta' => 'required|string|max:50',
            'tanggal_berangkat' => 'required|date',
            'asal_id' => 'required',
            'tujuan_id' => 'required',
            'harga' => 'required',
        ]);
        $kereta = new Kereta();
        $kereta->nomor_polisi = $request->nomor_polisi;
        $kereta->nama_kereta = $request->nama_kereta;
        $kereta->tanggal_berangkat = $request->tanggal_berangkat;
        $kereta->asal_id = $request->asal_id;
        $kereta->tujuan_id = $request->tujuan_id;
        $kereta->harga = $request->harga;
        $kereta->save();
        $kereta = $request->all();
        return redirect()->route('kereta.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kereta  $kereta
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kereta = Kereta::findOrFail($id);
        return view('layouts.kereta.show', compact('kereta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kereta  $kereta
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kereta = Kereta::findOrFail($id);
        return view('layouts.kereta.edit', [
            'dataasal' => Asal::all(),
            'datatujuan' => Tujuan::all()
        ], compact('kereta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kereta  $kereta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nomor_polisi' => 'required|unique:keretas,nomor_polisi,' .$id,
            'nama_kereta' => 'required|unique:keretas,nama_kereta,' .$id,
            'tanggal_berangkat' => 'required',
            'asal_id' => 'required',
            'tujuan_id' => 'required',
            'harga' => 'required',
        ]);
        $kereta = Kereta::findOrFail($id);
        $kereta->nomor_polisi = $request->nomor_polisi;
        $kereta->nama_kereta = $request->nama_kereta;
        $kereta->tanggal_berangkat = $request->tanggal_berangkat;
        $kereta->asal_id = $request->asal_id;
        $kereta->tujuan_id = $request->tujuan_id;
        $kereta->harga = $request->harga;
        $kereta->save();
        return view('layouts.kereta.show', compact('kereta'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kereta  $kereta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kereta::findOrFail($id)->delete();
        return redirect()->route('kereta.index');
    }
}
