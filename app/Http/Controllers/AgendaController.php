<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Agenda;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agenda = Agenda::all();

        return response()->json(['message' => 'Data agenda', 'data' => $agenda]);
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
        $agenda = Agenda::create([
            'nama_agenda' => $request->nama,
            'tempat_agenda' => $request->tempat,
            'deskripsi_agenda' => $request->deskripsi,
            'waktu_agenda' => $request->waktu,
            'tgl_publish' => $tgl,
        ]);

        return response()->json(['message' => 'Data berhasil ditambahkan', 'data' => $agenda]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $agenda = Agenda::where('id', $request->id)->first();

        return response()->json(['message' => 'Data agenda, nama agenda = '.$agenda->nama_agenda, 'data' => $agenda]);
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $agenda = agenda::find($request->id);
        $agenda->delete();

        return response()->json(['message' => 'Data berhasil dihapus']);
    }
}
