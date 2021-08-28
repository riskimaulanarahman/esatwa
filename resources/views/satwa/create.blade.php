@extends('layouts.backend')

@section('title', 'Tambah Satwa')

@section('content')
    
    <div class="page-bar">
    <h3>Tambah Satwa</h3> <br>
    <!-- nama, stok, harga jual, harga produksi -->
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    </div>
        <form role="form" method="post" action="{{route('satwa.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-body">
                
                <div class="form-group">
                    <label>Nama Satwa</label>
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="">
                    <span class="help-block">
                    berisi lokasi satwa</span>
                </div>

                <div class="form-group">
                    <label>Spesies</label>
                    <input type="text" class="form-control" name="spesies" id="spesies" placeholder="">
                    <span class="help-block">
                    berisi spesies satwa </span>
                </div>

                <div class="form-group">
                    <label>Asal</label>
                    <input type="text" class="form-control" name="asal" id="asal" placeholder="">
                    <span class="help-block">
                    berisi daerah asal satwa </span>
                </div>
                
                <div class="form-group">
                    <label>Deskripsi</label> <br>
                    <textarea name="deskripsi" id="deskripsi" cols="140" rows="5" value=""></textarea>
                </div>
                
                <div class="form-group">
                    <label for="inputfile">Gambar Satwa</label>
                    <input type="file" id="image_upload" name="image_upload">
                    
                </div>
                
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-info">Submit</button>
                <button type="button" class="btn btn-default">Cancel</button>
            </div>
        </form>

        @endsection