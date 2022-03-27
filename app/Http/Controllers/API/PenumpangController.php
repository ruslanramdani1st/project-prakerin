<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Penumpang;
use App\Models\Kereta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenumpangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penumpang = DB::table('penumpangs')
            ->join('users', 'penumpangs.user_id', '=', 'user_id')
            ->join('keretas', 'penumpangs.kereta_id', '=', 'kereta_id')
            ->select('users.name', 'penumpangs.tanggal_berangkat', 'keretas.nama_kereta', 'penumpangs.jumlah_penumpang', 'penumpangs.kelas', 'penumpangs.total')
            ->get();

        // make response JSON
        return response()->json([
            'success' => true,
            'massage' => 'Semua Data Penumpang',
            'data' => $penumpang,
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

            // make response JSON
            return response()->json([
                'success' => true,
                'massage' => 'Data Kereta Api',
                'data' => $kereta,
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $penumpang = Penumpang::findOrFail($id);

        // make response JSON
        return response()->json([
            'success' => true,
            'massage' => 'Data Show Penumpang',
            'data' => $penumpang,
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
        $penumpang = Penumpang::findOrFail($id);

        // make response JSON
        return response()->json([
            'success' => true,
            'massage' => 'Data Edit Penumpang',
            'data' => $penumpang,
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

        $kereta = Kereta::findOrFail($request->kereta_id);
        $penumpang->total = $kereta->harga * $request->jumlah_penumpang;
        $penumpang->save();

        // make response JSON
        return response()->json([
            'success' => true,
            'massage' => 'Data Update Penumpang',
            'data' => $penumpang,
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
        $penumpang = Penumpang::findOrFail($id);
        $penumpang->delete();

        // make response JSON
        return response()->json([
            'success' => true,
            'massage' => 'Data Hapus Data Penumpang',
            'data' => $penumpang,
        ], 200);
    }
}
