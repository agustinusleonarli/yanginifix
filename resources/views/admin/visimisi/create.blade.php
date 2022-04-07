@extends('layouts.app')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Agenda</h1>
            </div>

            <div class="section-body">

                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-bell"></i> Tambah Agenda</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.visimisi.store') }}" method="POST">
                            @csrf

                             <div class="form-group">
                                <label>Kata Sambutan</label>
                                <input type="text" name="katasambutan" value="{{ old('katasambutan') }}" placeholder="Masukkan Judul Agenda" class="form-control @error('katasambutan') is-invalid @enderror">

                                @error('katasambutan')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Visi</label>
                                <input type="text" name="visi" value="{{ old('visi') }}" placeholder="Masukkan Judul Agenda" class="form-control @error('visi') is-invalid @enderror">

                                @error('visi')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div> 
                            <div class="form-group">
                                <label>Misi</label>
                                <input type="text" name="misi" value="{{ old('misi') }}" placeholder="Masukkan Judul Agenda" class="form-control @error('misi') is-invalid @enderror">

                                @error('misi')
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
