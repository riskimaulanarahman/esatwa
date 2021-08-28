<?php

namespace App\Http\Controllers;

use App\Satwa;
use App\Pengaduan;
use App\LokasiWisata;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = Satwa::with('lokasi')->get();
        return view('frontend.index', compact('query'));
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
        //store pengaduan
        $data = new Pengaduan();
        $data->alasan=$request->get('alasan');
        $data->telepon=$request->get('telepon');
        $data->lokasi_satwa=$request->get('lokasi_satwa');
        $fileName =  "gambar".rand(10,100).".jpg";
        $data->gambar=$fileName;
        $data->save();

        $destinationPath =  "images/";

        if ($request->hasFile('image_upload')) {
            $request->image_upload->move($destinationPath, $fileName);
        }
        return redirect()->route('frontend.index')->with('status','Pengaduan satwa berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Satwa  $satwa
     * @return \Illuminate\Http\Response
     */
    public function show(Satwa $satwa)
    {
        //show detail satwa

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Satwa  $satwa
     * @return \Illuminate\Http\Response
     */
    public function edit(Satwa $satwa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Satwa  $satwa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Satwa $satwa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Satwa  $satwa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengaduan $pengaduan)
    {
        try {
            $pengaduan->delete();
            return redirect()->route('satwa.index')->with('status','Data Pengaduan berhasil dihapus');
        } catch (\PDOException $e) {
            $msg="Data Gagal dihapus. Data pengaduan digunakan pada field lain";
            return redirect()->route('satwa.index')->with('status',
                $msg);
        }
    }

    public function satwadetail($id)
    {
        //show detail satwa
        $query = Satwa::with('lokasi')->where('idSatwa',$id)->first();
        $data = $query;
        return view('frontend.detail', compact('data'));
    }

    public function pengaduan()
    {
        return view('pengaduan.create'); //buat pengaduan baru
    }

    public function lihatLokasi()
    {
        $query = LokasiWisata::all();
        return view('lokasi_wisata.index', compact('query'));
    }
}
