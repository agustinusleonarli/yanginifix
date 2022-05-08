@extends('layouts.app')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Dosen</h1>
            </div>

            <div class="section-body">

                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-bell"></i> Tambah Dosen</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.dosen.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                             <div class="form-group">
                                <label>Nama Dosen</label>
                                <input type="text" name="dosen_nama" value="{{ old('dosen_nama') }}" placeholder="Masukkan Nama Dosen" class="form-control @error('dosen_nama') is-invalid @enderror">

                                @error('dosen_nama')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Nomor Telepon</label>
                                <input type="text" name="dosen_notelp" value="{{ old('dosen_notelp') }}" placeholder="Masukkan Nomor Telepon" class="form-control @error('dosen_notelp') is-invalid @enderror">

                                @error('dosen_notelp')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div> 
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" name="dosen_alamat" value="{{ old('dosen_alamat') }}" placeholder="Masukkan Alamat" class="form-control @error('dosen_alamat') is-invalid @enderror">

                                @error('dosen_alamat')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <input type="text" name="dosen_deskripsi" value="{{ old('dosen_deskripsi') }}" placeholder="Masukkan Deskripsi Dosen" class="form-control @error('dosen_deskripsi') is-invalid @enderror">

                                @error('dosen_deskripsi')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>GAMBAR</label>
                                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">

                                @error('image')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>



                            <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i> SIMPAN</button>
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
