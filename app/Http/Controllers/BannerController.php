<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner = Banner::all();

        return response()->json(['message' => 'Data Banner', 'data' => $banner]);
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
        $banner = Banner::create([
            'gambar_banner' => $request->gambar,
            'judul_banner' => $request->judul,
            'text_banner' => $request->text,
        ]);

        return response()->json(['message' => 'Data berhasil ditambahkan', 'data' => $banner]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $banner = Banner::where('id', $request->id)->first();

        return response()->json(['message' => 'Data banner, judul = '.$banner->judul_banner, 'data' => $banner]);
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
        $banner = Banner::find($request->id);
        
        $banner->judul_banner = $request->judul;
        $banner->text_banner = $request->text;
        $banner->gambar_banner = $request->gambar;
        $banner->save();

        return response()->json(['message' => 'Data berhasil diubah', 'data' => $banner]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $banner = Banner::find($request->id);
        $banner->delete();

        return response()->json(['message' => 'Data berhasil dihapus']);
    }
}
