<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Asal;
use Illuminate\Http\Request;

class AsalController extends Controller
{
    public function index()
    {
        $asal = Asal::all();

        // make response JSON
        return response()->json([
            'success' => true,
            'massage' => 'List Asal Berangkat',
            'data' => $asal,
        ], 200);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'kota_asal' => 'required|string|max:50',
        ]);
        $asal = new Asal();
        $asal->kota_asal = $request->kota_asal;
        $asal->save();

        // make response JSON
        return response()->json([
            'success' => true,
            'massage' => 'List Asal Berangkat',
            'data' => $asal,
        ], 200);
    }

    public function show($id)
    {
        $asal = Asal::findOrFail($id);

        // make response JSON
        return response()->json([
            'success' => true,
            'massage' => 'List Asal Berangkat',
            'data' => $asal,
        ], 200);
    }

    public function edit($id)
    {
        // $asal = Asal::findOrFail($id);

        //  // make response JSON
        //  return response()->json([
        //     'success' => true,
        //     'massage' => 'List Asal Berangkat',
        //     'data' => $asal,
        // ], 200);
    }

    public function update(Request $request, $id)
    {
        $asal = Asal::findOrFail($id);
        $asal->kota_asal = $request->kota_asal;
        $asal->save();

        // make response JSON
        return response()->json([
            'success' => true,
            'massage' => 'List Ubah Data Asal Berangkat',
            'data' => $asal,
        ], 200);
    }

    public function destroy($id)
    {
        $asal = Asal::findOrFail($id);
        $asal->delete();

        // make response JSON
        return response()->json([
            'success' => true,
            'massage' => 'List Hapus Data Asal Berangkat',
            'data' => $asal,
        ], 200);
    }
}
