<?php

namespace App\Http\Controllers;

use App\Models\Asal;
use Illuminate\Http\Request;

class AsalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $awal = Asal::all();
        return view('layouts.asal.index', compact('awal'));

        // // make response JSON
        // return response()->json([
        //     'success' => true,
        //     'massage' => 'List Asal Berangkat',
        //     'data' => $awal,
        // ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.asal.create');
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
            'kota_asal' => 'required|string|max:50',
        ]);
        $awal = new Asal();
        $awal->kota_asal = $request->kota_asal;
        $awal->save();
        $awal = $request->all();
        return redirect()->route('asal.index')->with('succsess','Product created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Asal  $asal
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $awal = Asal::findOrFail($id);
        return view('layouts.asal.show', compact('awal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Asal  $asal
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $awal = Asal::findOrFail($id);
        return view('layouts.asal.edit', compact('awal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Asal  $asal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'kota_asal' => 'required|unique:asals,kota_asal,' .$id,
        ]);
        $awal = Asal::findOrFail($id);
        $awal->kota_asal = $request->kota_asal;
        $awal->save();
        return view('layouts.asal.show', compact('awal'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Asal  $asal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Asal::findOrFail($id)->delete();
        return redirect()->route('asal.index');
    }
}
