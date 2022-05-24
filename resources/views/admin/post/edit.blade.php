@extends('layouts.app')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>EDIT PRODI</h1>
            </div>

            <div class="section-body">

                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-folder"></i> EDIT PRODI</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.prodi.update', $prodi->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>PRODI</label>
                                <input type="text" name="nama_prodi" value="{{ old('nama_prodi', $prodi->nama_prodi) }}" placeholder="Masukkan Nama Kategori" class="form-control @error('nama_prodi') is-invalid @enderror">

                                @error('nama_prodi')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i> UPDATE</button>
                            <button class="btn btn-warning btn-reset" type="reset"><i class="fa fa-redo"></i> RESET</button>

                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop
