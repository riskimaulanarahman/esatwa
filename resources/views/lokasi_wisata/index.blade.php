@extends('layouts.frontend')

@section('title', 'Lokasi Wisata')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Lokasi Konservasi</div>

                <div class="card-body">


                    <table id="nota" class="table table-hover table-condensed">
                        <thead>
                        <tr>
                            <th style="width:10%">Kode</th>
                            <th style="width:20%">Nama Lokasi</th>
                            <th style="width:60%">Alamat Lengkap</th>
                            <th style="width:10%">Link</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($query as $t)
                            <tr>
                                <td data-th="Kode">
                                   {{ $t->id }}
                                </td>
                                <td data-th="Kategori">
                                    {{ $t->nama_lokasi }}
                                </td>
                                <td data-th="Kategori">
                                    {{ $t->alamat }}
                                </td>
                                <td>
                                    <a href="{{ $t->link }}" target="_blank">maps</a>
                                <!-- <input type='submit' value='hapus' class='btn btn-xs btn-danger'/> -->
                                </td>


                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
