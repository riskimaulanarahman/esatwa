@extends('layouts.backend')

@section('title', 'Daftar Pengaduan')


@section('content')

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-13">
            <div class="card">
                <div class="card-header">Daftar Pengaduan</div>



                    <table id="nota" class="table table-hover table-condensed">
                        <thead>
                        <tr>
                            <!-- <th style="width:5%">ID</th> -->
                            <th style="width:20%">gambar</th>
                            <th style="width:25%">alasan</th>
                            <th style="width:20%">lokasi</th>
                            <th style="width:10%">tanggal</th>
                            <th style="width:10%">telp</th>
                            <th style="width:10%">status</th>
                            <th style="width:10%">aksi</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($query as $t)
                            <tr>
                                <!-- <td data-th="Kode">
                                   {{ $t->id }}
                                </td> -->
                                <td data-th="Kategori">
                                <img src="{{ asset('images/'.$t->gambar) }}" width="250" height="250">
                                {{-- <img src="{{ $t->gambar }}" width="250" height="250"> --}}
                                </td>
                                <td data-th="Kode">
                                   {{ $t->alasan }}
                                </td>
                                <td data-th="">
                                    {{ $t->lokasi_satwa }}
                                </td>
                                <td data-th="tanggal">
                                    {{ $t->tanggal }}
                                </td>
                                <td data-th="tanggal">
                                    {{ $t->telepon }}
                                </td>
                                <td>
                                {{ $t->status }}

                                </td>
                                <td>
                                <button onclick="ubahPengaduan({{$t->id}})" class="btn btn-warning">ubah status</button>
                                </td>

                                <!-- <td class="actions" data-th="">
                                <form method='POST' action="{{url('frontend/'.$t->id )}}" >
                                @csrf
                                @method('DELETE')
                                <input type='submit' value='hapus' class='btn btn-xs btn-danger'
                                    onclick="if(!confirm('apakah anda yakin?')) return false;"/>
                                </form>
                                </td> -->


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
<div class="modal fade" id="modal-pengaduan">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Ubah Pengaduan <i id="title-pengaduan"></i></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form method="POST" id="form-pengaduan" action="{{route('ubahpengaduan')}}" enctype="multipart/form-data">
                    <div class="form-group row m-b-15">
                        {{-- <input type="hidden" name="module" id="module" value="satwa"> --}}
                        <input type="hidden" name="getid" id="getid">
                    </div>
                    <div class="form-group row m-b-15">
                        <label class="col-md-3 col-form-label">Status :</label>
                        <div class="col-md-7">
                            <select name="status" id="status" class="form-control">
                                <option value="belum dicek">Belum dicek</option>
                                <option value="sudah dicek">Sudah dicek</option>
                            </select>
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

    function ubahPengaduan(id) {
        // alert('ubah '+$id);
        $('#modal-pengaduan').modal('show');
        $('#getid').val(id);

        // setTimeout(function() {
            $.getJSON('/api/get-pengaduan/'+id,function(data){
                $('#status').val(data.status).change();
            })
        // }, 1000);

    }
</script>
