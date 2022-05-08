@extends('layouts.app')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Penghargaan</h1>
            </div>

            <div class="section-body">

                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-bell"></i> Edit Penghargaan</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.penghargaan.update', $penghargaan->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Nama Penghargaan</label>
                                <input type="text" name="jdl_penghargaan" value="{{ old('jdl_penghargaan', $penghargaan->jdl_penghargaan) }}" placeholder="Masukkan Nama Penghargaan" class="form-control @error('jdl_penghargaan') is-invalid @enderror">

                                @error('jdl_penghargaan')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Deskripsi Penghargaan</label>
                                        <input type="text" name="desc_penghargaan" value="{{ old('desc_penghargaan', $penghargaan->desc_penghargaan) }}" placeholder="Masukkan Deksripsi Penghargaan" class="form-control @error('desc_penghargaan') is-invalid @enderror">
        
                                        @error('desc_penghargaan')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>TANGGAL</label>
                                    <input type="date" name="tgl_penghargaan" value="{{ old('tgl_penghargaan', $penghargaan->tgl_penghargaan) }}" class="form-control @error('tgl_penghargaan') is-invalid @enderror">
    
                                    @error('tgl_penghargaan')
                                    <div class="invalid-feedback" style="display: block">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label>GAMBAR</label>
                                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
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
