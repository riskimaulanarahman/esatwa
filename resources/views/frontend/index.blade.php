@extends('layouts.frontend')

@section('title', 'Home')

@section('content')
@if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
@endif

    <div class="container products">

        <div class="row">

            @foreach($query as $product)
                <div class="col-xs-18 col-sm-6 col-md-3">
                    <div class="thumbnail">
                        <img src="{{ asset('images/'.$product->gambar) }}" width="250" height="250">
                        {{-- <img src="{{$product->gambar}}" width="250" height="250">     --}}
                        <div class="caption">
                            <h5>{{ Str::limit($product->nama, 20) }}</h5>
                            <li>Spesies : {{ Str::limit(strtolower($product->spesies), 15) }}</li>
                            <li>Lokasi : {{ Str::limit(strtolower($product->lokasi->nama_lokasi), 30) }}</li>


                            <p class="btn-holder"><a href="{{ url('/satwadetail'.$product->idSatwa) }}"
                               class="btn btn-warning btn-block text-center btn-disable" role="button">Detail</a> </p>


                        </div>
                    </div>
                </div>
            @endforeach

        </div><!-- End row -->

    </div>

@endsection
