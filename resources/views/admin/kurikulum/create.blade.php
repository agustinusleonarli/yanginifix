@extends('layouts.app')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Kurikulum</h1>
            </div>

            <div class="section-body">

                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-bell"></i> Tambah Kurikulum</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.kurikulum.store') }}" method="POST">
                            @csrf

                             <div class="form-group">
                                <label>Nama Kurikulum</label>
                                <input type="text" name="nama_matkul" value="{{ old('nama_matkul') }}" placeholder="Masukkan Judul Agenda" class="form-control @error('nama_matkul') is-invalid @enderror">

                                @error('nama_matkul')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Semester Matkul</label>
                                <input type="text" name="sem_matkul" value="{{ old('sem_matkul') }}" placeholder="Masukkan Judul Agenda" class="form-control @error('sem_matkul') is-invalid @enderror">

                                @error('sem_matkul')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div> 
                            <div class="form-group">
                                <label>SKS Matkul</label>
                                <input type="text" name="sks_matkul" value="{{ old('sks_matkul') }}" placeholder="Masukkan Judul Agenda" class="form-control @error('sks_matkul') is-invalid @enderror">

                                @error('sks_matkul')
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