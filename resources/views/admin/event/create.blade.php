@extends('layouts.app')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Acara</h1>
            </div>

            <div class="section-body">

                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-bell"></i> Tambah Acara</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.event.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label>NAMA ACARA</label>
                                <input type="text" name="nama_acara" value="{{ old('nama_acara') }}" placeholder="Masukkan Judul Acara" class="form-control @error('nama_acara') is-invalid @enderror">

                                @error('nama_acara')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>DEKSRIPSI ACARA</label>
                                <input type="text" name="deskripsi_acara" value="{{ old('deskripsi_acara') }}" placeholder="Masukkan Judul Acara" class="form-control @error('deskripsi_acara') is-invalid @enderror">

                                @error('deskripsi_acara')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>LOKASI ACARA</label>
                                <input type="text" name="lokasi_acara" value="{{ old('lokasi_acara') }}" placeholder="Masukkan Lokasi Acara" class="form-control @error('lokasi_acara') is-invalid @enderror">

                                @error('lokasi_acara')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>TANGGAL</label>
                                    <input type="date" name="date" value="{{ old('date') }}" class="form-control @error('date') is-invalid @enderror">
    
                                    @error('date')
                                    <div class="invalid-feedback" style="display: block">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
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
