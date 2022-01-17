<?php

namespace App\Http\Controllers;

use App\Models\Tujuan;
use Illuminate\Http\Request;

class TujuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tujuan = Tujuan::all();
        return view('layouts.tujuan.index', compact('tujuan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.tujuan.create');
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
            'kota_tujuan' => 'required|string|max:50',
        ]);
        $tujuan = new Tujuan();
        $tujuan->kota_tujuan = $request->kota_tujuan;
        $tujuan->save();
        $tujuan = $request->all();
        return redirect()->route('tujuan.index')->with('succsess','Product created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tujuan  $tujuan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tujuan = Tujuan::findOrFail($id);
        return view('layouts.tujuan.show', compact('tujuan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tujuan  $tujuan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tujuan = Tujuan::findOrFail($id);
        return view('layouts.tujuan.edit', compact('tujuan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tujuan  $tujuan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'kota_tujuan' => 'required|unique:tujuans,kota_tujuan,' .$id,
        ]);
        $tujuan = Tujuan::findOrFail($id);
        $tujuan->kota_tujuan = $request->kota_tujuan;
        $tujuan->save();
        return view('layouts.tujuan.show', compact('tujuan'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tujuan  $tujuan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tujuan::findOrFail($id)->delete();
        return redirect()->route('tujuan.index');
    }
}
