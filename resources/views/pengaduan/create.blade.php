@extends('layouts.frontend')

@section('title', 'Pojok Pengaduan')

@section('content')

    <div class="page-bar">
    <h3>Pojok Pengaduan</h3> <br>
    <!-- <h5>adakjsdhkjasd hsdadha djashdlas dasjdlas</h5> -->
    <!-- <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Illum fugiat aliquid, sed ut officiis voluptas, facilis quod sapiente pariatur soluta tempora officia distinctio. Qui deserunt, tenetur delectus doloribus eaque natus?</p> -->

    <br>
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    </div>
        <form role="form" method="post" action="{{route('frontend.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-body">

                <div class="form-group">
                    <label>Lokasi Satwa</label>
                    <input type="text" class="form-control" name="lokasi_satwa" id="lokasi_satwa" placeholder="">
                    <span class="help-block">
                    berisi alamat ditemukannya satwa </span>
                </div>
                <div class="form-group">
                    <label>Telepon</label> <br>
                    <input type="text" class="form-control" name="telepon" id="telepon">
                </div>
                <div class="form-group">
                    <label>Alasan</label> <br>
                    <textarea name="alasan" id="alasan" cols="140" rows="5" value="" class="form-control"></textarea>
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
