@extends('layouts.backend')

@section('title', 'Daftar')

@section('content')


<div class="container">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Daftar Satwa</div>



                    <table id="nota" class="table table-hover table-condensed">
                        <thead>
                        <tr>
                            <th style="width:5%">ID</th>
                            <th style="width:30%">gambar</th>
                            <th style="width:15%">Nama</th>
                            <th style="width:10%">Spesies</th>
                            <th style="width:10%">Asal</th>
                            <th style="width:30%">Deskripsi</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($query as $t)
                            <tr>
                                <td data-th="Kode">
                                   {{ $t->idSatwa }}
                                </td>
                                <td data-th="Kategori">
                                <img src="{{ asset('images/'.$t->gambar) }}" width="250" height="250">
                                {{-- <img src="{{$t->gambar}}" width="250" height="250"> --}}
                                </td>
                                <td data-th="Kode">
                                   {{ $t->nama }}
                                </td>
                                <td data-th="Kategori">
                                    {{ $t->spesies }}
                                </td>
                                <td data-th="Kode">
                                   {{ $t->asal }}
                                </td>
                                <td data-th="Kategori">
                                    {{ $t->deskripsi }}
                                </td>



                                <td class="actions" data-th="">
                                <button onclick="ubahsatwa({{$t->idSatwa}},'{{$t->nama}}')" class="btn btn-warning">ubah</button>
                                <form method='POST' action="{{url('satwa/'.$t->idSatwa )}}" >
                                @csrf
                                @method('DELETE')
                                <input type='submit' value='hapus' class='btn btn-xs btn-danger'
                                    onclick="if(!confirm('apakah anda yakin?')) return false;"/>
                                </form>
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

<!-- Modal -->
<div class="modal fade" id="modal-satwa">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Ubah Satwa <i id="title-satwa"></i></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form method="POST" id="form-satwa" action="{{route('ubahsatwa')}}" enctype="multipart/form-data">
                    <div class="form-group row m-b-15">
                        {{-- <input type="hidden" name="module" id="module" value="satwa"> --}}
                        <input type="hidden" name="getid" id="getid">
                    </div>
                    <div class="form-group row m-b-15">
                        <label class="col-md-3 col-form-label">Nama :</label>
                        <div class="col-md-7">
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="" />
                        </div>
                    </div>
                    <div class="form-group row m-b-15">
                        <label class="col-md-3 col-form-label">Spesies :</label>
                        <div class="col-md-7">
                        <input type="text" name="spesies" id="spesies" class="form-control" placeholder="" />
                        </div>
                    </div>
                    <div class="form-group row m-b-15">
                        <label class="col-md-3 col-form-label">Asal :</label>
                        <div class="col-md-7">
                        <input type="text" name="asal" id="asal" class="form-control" placeholder="" />
                        </div>
                    </div>
                    <div class="form-group row m-b-15">
                        <label class="col-md-3 col-form-label">Lokasi :</label>
                        <div class="col-md-7">
                            <select name="lokasi" id="lokasi" class="form-control">
                                <option value="">-- Pilih Lokasi --</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row m-b-15">
                        <label class="col-md-3 col-form-label">Deskripsi :</label>
                        <div class="col-md-7">
                        <input type="text" name="deskripsi" id="deskripsi" class="form-control" placeholder="" />
                        </div>
                    </div>
                    <div class="form-group row m-b-15">
                        <label class="col-md-3 col-form-label">Gambar :</label>
                        <div class="col-md-7">
                        <input type="file" name="image_upload" id="image_upload" class="form-control" placeholder="" readonly/>
                        <p>Nama file : <b id="namafile">-</b></p>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <a href="javascript:;" class="btn btn-white" data-dismiss="modal">Close</a>
                <input type="submit" class="btn btn-success" id="btn-action" value="Simpan">
            </div>
            </form>
        </div>
    </div>
</div>


@endsection

<script>

    function ubahsatwa(id,nama) {
        // alert('ubah '+$id);
        $('#modal-satwa').modal('show');
        $('#title-satwa').text(nama);
        $('#getid').val(id);

        $.getJSON('/api/list-lokasi',function(item){
            $('#lokasi').html('');
            $('#lokasi').append('<option value="">-- Pilih Lokasi --</option>')
            $.each(item.data,function(x,y){
                $('#lokasi').append('<option value="'+y.id+'">'+y.nama_lokasi+'</option>')
            })
        });

        setTimeout(function() { $.getJSON('/api/get-satwa/'+id,function(data){
                $('#nama').val(data.nama);
                $('#spesies').val(data.spesies);
                $('#asal').val(data.asal);
                $('#deskripsi').val(data.deskripsi);
                $('#namafile').text(data.gambar.substring(0,10));
                $('#lokasi').val(data.id_lokasi).change();
            })
        }, 1000);

    }
</script>
