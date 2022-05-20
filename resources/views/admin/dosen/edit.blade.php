@extends('layouts.app')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Dosen</h1>
            </div>

            <div class="section-body">

                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-bell"></i> Edit Dosen</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.dosen.update', $dosen->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Nama Dosen</label>
                                <input type="text" name="dosen_nama" value="{{ old('dosen_nama', $dosen->dosen_nama) }}" placeholder="Masukkan Nama Dosen" class="form-control @error('dosen_nama') is-invalid @enderror">

                                @error('dosen_nama')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>No Telp</label>
                                        <input type="text" name="dosen_notelp" value="{{ old('dosen_notelp', $dosen->dosen_notelp) }}" placeholder="Masukkan No Telepon" class="form-control @error('dosen_notelp') is-invalid @enderror">
        
                                        @error('dosen_notelp')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="text" name="dosen_alamat" value="{{ old('dosen_alamat', $dosen->dosen_alamat) }}" placeholder="Masukkan Alamat" class="form-control @error('dosen_alamat') is-invalid @enderror">
        
                                        @error('dosen_alamat')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Deskripsi</label>
                                        <input type="text" name="dosen_deskripsi" value="{{ old('dosen_deskripsi', $dosen->dosen_deskripsi) }}" placeholder="Masukkan Deskripsi Dosen" class="form-control @error('dosen_deskripsi') is-invalid @enderror">
        
                                        @error('dosen_deskripsi')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>GAMBAR</label>
                                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                            </div>
                            <div class="form-group">
                                <label>Prodi</label>
                                <select class="form-control select-category @error('prodi_id') is-invalid @enderror"
                                    name="prodi_id">
                                    <option value="">-- PILIH KATEGORI --</option>
                                    @foreach ($prodis as $prodi)
                                        @if($dosen->prodi_id == $prodi->id)
                                            <option value="{{ $prodi->id  }}" selected>{{ $prodi->nama_prodi }}</option>
                                        @else
                                            <option value="{{ $prodi->id  }}">{{ $prodi->nama_prodi }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('prodi_id')
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.6.2/tinymce.min.js"></script>
    <script>
        var editor_config = {
            selector: "textarea.content",
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            relative_urls: false,
        };

        tinymce.init(editor_config);
    </script>
@stop
