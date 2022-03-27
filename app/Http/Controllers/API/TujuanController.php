<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Tujuan;
use Illuminate\Http\Request;

class TujuanController extends Controller
{
    public function index()
    {
        $tujuan = Tujuan::all();

        // make response JSON
        return response()->json([
            'success' => true,
            'massage' => 'Semua data tujuan Berangkat',
            'data' => $tujuan,
        ], 200);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'kota_tujuan' => 'required|string|max:50',
        ]);
        $tujuan = new Tujuan();
        $tujuan->kota_tujuan = $request->kota_tujuan;
        $tujuan->save();

        // make response JSON
        return response()->json([
            'success' => true,
            'massage' => 'Data store tujuan Berangkat',
            'data' => $tujuan,
        ], 200);
    }

    public function show($id)
    {
        $tujuan = Tujuan::findOrFail($id);

        // make response JSON
        return response()->json([
            'success' => true,
            'massage' => 'Data show tujuan Berangkat',
            'data' => $tujuan,
        ], 200);
    }

    public function edit($id)
    {
        $tujuan = tujuan::findOrFail($id);

         // make response JSON
         return response()->json([
            'success' => true,
            'massage' => 'Data edit tujuan Berangkat',
            'data' => $tujuan,
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $tujuan = Tujuan::findOrFail($id);
        $tujuan->kota_tujuan = $request->kota_tujuan;
        $tujuan->save();

        // make response JSON
        return response()->json([
            'success' => true,
            'massage' => 'Ubah Data tujuan Berangkat',
            'data' => $tujuan,
        ], 200);
    }

    public function destroy($id)
    {
        $tujuan = Tujuan::findOrFail($id);
        $tujuan->delete();

        // make response JSON
        return response()->json([
            'success' => true,
            'massage' => 'Hapus Data tujuan Berangkat',
            'data' => $tujuan,
        ], 200);
    }
}
