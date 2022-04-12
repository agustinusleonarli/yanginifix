@extends('layouts.app')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Penghargaan </h1>
        </div>

        <div class="section-body">

            <div class="card">
                <div class="card-header">
                    <h4><i class="fas fa-bell"></i> Penghargaan </h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.penghargaan.index') }}" method="GET">
                        <div class="form-group">
                            <div class="input-group mb-3">
                                @can('penghargaans.create')
                                    <div class="input-group-prepend">
                                        <a href="{{ route('admin.penghargaan.create') }}" class="btn btn-primary" style="padding-top: 10px;"><i class="fa fa-plus-circle"></i> TAMBAH</a>
                                    </div>
                                @endcan
                                {{-- <input type="text" class="form-control" name="q"
                                       placeholder="cari berdasarkan judul agenda"> --}}
                                {{-- <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> CARI
                                    </button>
                                </div> --}}
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col" style="text-align: center;width: 6%">No</th>
                                <th scope="col">Judul Penghargaan</th>
                                <th scope="col">Deskripsi Penghargaan </th>
                                <th scope="col">Tanggal </th>
                                <th scope="col">Foto </th>
                                <th scope="col" style="width: 15%;text-align: center">AKSI</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($penghargaans as $no => $penghargaan)
                                <tr>
                                    <th scope="row" style="text-align: center">{{ ++$no + ($penghargaans->currentPage()-1) * $penghargaans->perPage() }}</th>
                                    <td>{{ $penghargaan->jdl_penghargaan }}</td>
                                    <td>{{ $penghargaan->desc_penghargaan}}</td>
                                    <td>{{ $penghargaan->tgl_penghargaan}}</td>                                   
                                    <td><img src="{{ $penghargaan->image }}" style="width: 120px"></td>
                                    <td class="text-center">
                                        @can('penghargaans.edit')
                                            <a href="{{ route('admin.penghargaan.edit', $penghargaan->id) }}" class="btn btn-sm btn-primary">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                        @endcan

                                        @can('penghargaans.delete')
                                            <button onClick="Delete(this.id)" class="btn btn-sm btn-danger" id="{{ $penghargaan->id }}">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div style="text-align: center">
                            {{$penghargaans->links("vendor.pagination.bootstrap-4")}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>

<script>
    //ajax delete
    function Delete(id)
        {
            var id = id;
            var token = $("meta[name='csrf-token']").attr("content");

            swal({
                title: "APAKAH KAMU YAKIN ?",
                text: "INGIN MENGHAPUS DATA INI!",
                icon: "warning",
                buttons: [
                    'TIDAK',
                    'YA'
                ],
                dangerMode: true,
            }).then(function(isConfirm) {
                if (isConfirm) {

                    //ajax delete
                    jQuery.ajax({
                        url: "{{ route("admin.penghargaan.index") }}/"+id,
                        data:     {
                            "id": id,
                            "_token": token
                        },
                        type: 'DELETE',
                        success: function (response) {
                            if (response.status == "success") {
                                swal({
                                    title: 'BERHASIL!',
                                    text: 'DATA BERHASIL DIHAPUS!',
                                    icon: 'success',
                                    timer: 1000,
                                    showConfirmButton: false,
                                    showCancelButton: false,
                                    buttons: false,
                                }).then(function() {
                                    location.reload();
                                });
                            }else{
                                swal({
                                    title: 'GAGAL!',
                                    text: 'DATA GAGAL DIHAPUS!',
                                    icon: 'error',
                                    timer: 1000,
                                    showConfirmButton: false,
                                    showCancelButton: false,
                                    buttons: false,
                                }).then(function() {
                                    location.reload();
                                });
                            }
                        }
                    });

                } else {
                    return true;
                }
            })
        }
</script>
@stop
