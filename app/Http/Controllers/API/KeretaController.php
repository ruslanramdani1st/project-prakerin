<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Kereta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KeretaController extends Controller
{
    public function index()
    {
        $kereta = DB::table('keretas')
            ->join('asals', 'keretas.asal_id', '=', 'asal_id')
            ->join('tujuans', 'keretas.tujuan_id', '=', 'tujuan_id')
            ->select('keretas.nomor_polisi', 'keretas.nama_kereta', 'keretas.tanggal_berangkat', 'asals.kota_asal', 'tujuans.kota_tujuan', 'keretas.harga')->get();

        // make response JSON
        return response()->json([
            'success' => true,
            'massage' => 'List Kereta Api',
            'data' => $kereta,
        ], 200);
    }

    public function create()
    {
        //
    }

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

        // make response JSON
        return response()->json([
            'success' => true,
            'massage' => 'List Kereta Api',
            'data' => $kereta,
        ], 200);
    }

    public function show($id)
    {
        $kereta = Kereta::findOrFail($id);

        // make response JSON
        return response()->json([
            'success' => true,
            'massage' => 'List Kereta Api',
            'data' => $kereta,
        ], 200);
    }

    public function edit($id)
    {
        // $asal = Asal::findOrFail($id);

        //  // make response JSON
        //  return response()->json([
        //     'success' => true,
        //     'massage' => 'List Kereta Api',
        //     'data' => $asal,
        // ], 200);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nomor_polisi' => 'required|unique:keretas,nomor_polisi,' . $id,
            'nama_kereta' => 'required|unique:keretas,nama_kereta,' . $id,
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

        // make response JSON
        return response()->json([
            'success' => true,
            'massage' => 'List Ubah Data Kereta Api',
            'data' => $kereta,
        ], 200);
    }

    public function destroy($id)
    {
        $kereta = Kereta::findOrFail($id);
        $kereta->delete();

        // make response JSON
        return response()->json([
            'success' => true,
            'massage' => 'List Hapus Data Asal Berangkat',
            'data' => $kereta,
        ], 200);
    }
}
