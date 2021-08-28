<?php

namespace App\Http\Controllers;

use App\Satwa;
use App\Pengaduan;
use App\LokasiWisata as Lokasi;
use Illuminate\Http\Request;

class BackEndController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = Satwa::all();
        return view('satwa.listSatwa', compact('query'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('satwa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Satwa();
        $data->nama=$request->get('nama');
        $data->spesies=$request->get('spesies');
        $data->asal=$request->get('asal');
        $data->deskripsi=$request->get('deskripsi');
        $fileName =  "satwa".rand(1,10).rand(500,1000).".jpg";
        $data->gambar=$fileName;
        $data->save();

        $destinationPath =  "images/";

        if ($request->hasFile('image_upload')) {
            $request->image_upload->move($destinationPath, $fileName);
        }
        return redirect()->route('frontend.index')->with('status','Data satwa berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Satwa  $satwa
     * @return \Illuminate\Http\Response
     */
    public function show(Satwa $satwa)
    {
        //
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
    public function destroy(Satwa $satwa)
    {
        try {
            $satwa->delete();
            return redirect()->route('satwa.index')->with('status','Data Satwa berhasil dihapus');
        } catch (\PDOException $e) {
            $msg="Data Gagal dihapus. Data satwa digunakan pada field lain";
            return redirect()->route('satwa.index')->with('status',
                $msg);
        }
    }

    public function cek_pengaduan()
    {
        $query = Pengaduan::all();
        return view('pengaduan.listPengaduan', compact('query'));
    }

    public function listsatwa()
    {
        try{

            $data = Satwa::with('lokasi')->get();
            return response()->json(["status" => true, "data" => $data]);

        } catch (\Exception $e){

            return response()->json(["status" => false, "message" => $e->getMessage()]);
        }
    }

    public function listlokasi()
    {
        try{
            $data = Lokasi::all();
            return response()->json(["status" => true, "data" => $data]);

        } catch (\Exception $e){

            return response()->json(["status" => false, "message" => $e->getMessage()]);
        }
    }

    public function getsatwa($id)
    {
        $data = Satwa::with('lokasi')->where('idSatwa',$id)->first();
        return $data;
    }

    public function getpengaduan($id)
    {
        $data = Pengaduan::where('id',$id)->first();
        return $data;
    }

    public function ubahsatwa(Request $req)
    {
        $fileName =  "satwa".rand(1,10).rand(500,1000).".jpg";
        $data = Satwa::where('idSatwa',$req->getid)->first();
        $data->nama = $req->nama;
        $data->spesies = $req->spesies;
        $data->asal = $req->asal;
        $data->id_lokasi = $req->lokasi;
        $data->deskripsi = $req->deskripsi;
        if($req->image_upload) {
            $data->gambar = $fileName;
        }
        $data->save();

        $destinationPath =  "images/";

        if ($req->hasFile('image_upload')) {
            $req->image_upload->move($destinationPath, $fileName);
        }

        return redirect()->route('satwa.index')->with('status','Berhasil Ubah Data!');
    }

    public function ubahpengaduan(Request $req)
    {
        $data = Pengaduan::where('id',$req->getid)->first();
        $data->status = $req->status;
        $data->save();

        return redirect()->route('backend.pengaduan')->with('status','Berhasil Ubah Data!');
    }

    public function tambahpengaduan(Request $request)
    {
        //store pengaduan
        try {
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

            return response()->json(["status" => true, "message" => "Berhasil Menambahkan Data"]);
        } catch (\Exception $e){

            return response()->json(["status" => false, "message" => $e->getMessage()]);
        }
    }

}
