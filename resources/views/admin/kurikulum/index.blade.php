@extends('layouts.app')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Kurikulum </h1>
        </div>

        <div class="section-body">

            <div class="card">
                <div class="card-header">
                    <h4><i class="fas fa-bell"></i> Kurikulum </h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.kurikulum.index') }}" method="GET">
                        <div class="form-group">
                            <div class="input-group mb-3">
                                @can('kurikulums.create')
                                    <div class="input-group-prepend">
                                        <a href="{{ route('admin.kurikulum.create') }}" class="btn btn-primary" style="padding-top: 10px;"><i class="fa fa-plus-circle"></i> TAMBAH</a>
                                    </div>
                                @endcan
                                <input type="text" class="form-control" name="q"
                                placeholder="cari berdasarkan nama mata kuliah">
                         <div class="input-group-append">
                             <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> CARI
                             </button>
                         </div>

                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col" style="text-align: center;width: 6%">No</th>
                                <th scope="col">Nama Matkul</th>
                                <th scope="col">Semester Matkul </th>
                                <th scope="col">SKS Matkul </th>
                                <th scope="col" style="width: 15%;text-align: center">AKSI</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($kurikulums as $no => $kurikulum)
                                <tr>
                                    <th scope="row" style="text-align: center">{{ ++$no + ($kurikulums->currentPage()-1) * $kurikulums->perPage() }}</th>
                                    <td>{{ $kurikulum->nama_matkul }}</td>
                                    <td>{{ $kurikulum->sem_matkul }}</td>
                                    <td>{{ $kurikulum->sks_matkul }}</td>
                                    <td class="text-center">
                                        @can('kurikulums.edit')
                                            <a href="{{ route('admin.kurikulum.edit', $kurikulum->id) }}" class="btn btn-sm btn-primary">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                        @endcan

                                        @can('kurikulums.delete')
                                            <button onClick="Delete(this.id)" class="btn btn-sm btn-danger" id="{{ $kurikulum->id }}">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div style="text-align: center">
                            {{$kurikulums->links("vendor.pagination.bootstrap-4")}}
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
                        url: "{{ route("admin.kurikulum.index") }}/"+id,
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