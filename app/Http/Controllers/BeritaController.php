<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Berita;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $berita = Berita::all();

        return response()->json(['message' => 'Data Berita', 'data' => $berita]);
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
        $tgl = Carbon::now();
        $berita = Berita::create([
            'judul_berita' => $request->judul,
            'isi_berita' => $request->isi,
            'foto_berita' => $request->foto,
            'tgl_publish' => $tgl,
        ]);

        return response()->json(['message' => 'Data berhasil ditambahkan', 'data' => $berita]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $berita = Berita::where('id', $request->id)->first();

        return response()->json(['message' => 'Data Berita, judul = '.$berita->judul_berita, 'data' => $berita]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $berita = Berita::find($request->id);
        
        $berita->judul_berita = $request->judul;
        $berita->isi_berita = $request->isi;
        $berita->foto_berita = $request->foto;
        $berita->save();

        return response()->json(['message' => 'Data berhasil diubah', 'data' => $berita]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $berita = Berita::find($request->id);
        $berita->delete();

        return response()->json(['message' => 'Data berhasil dihapus']);
    }
}
