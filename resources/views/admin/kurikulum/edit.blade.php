@extends('layouts.app')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Agenda</h1>
            </div>

            <div class="section-body">

                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-bell"></i> Edit Agenda</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.kurikulum.update', $kurikulum->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Nama Matkul</label>
                                <input type="text" name="nama_matkul" value="{{ old('nama_matkul', $kurikulum->nama_matkul) }}" placeholder="Masukkan Judul Agenda" class="form-control @error('nama_matkul') is-invalid @enderror">

                                @error('nama_matkul')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>SEMESTER MATKUL </label>
                                <input type="text" name="sem_matkul" value="{{ old('sem_matkul', $kurikulum->sem_matkul) }}" placeholder="Masukkan Judul Agenda" class="form-control @error('sem_matkul') is-invalid @enderror">

                                @error('sem_matkul')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                                
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>SKS Matkul</label>
                                        <input type="text" name="sks_matkul" value="{{ old('sks_matkul', $kurikulum->sks_matkul) }}" placeholder="Masukkan Lokasi Agenda" class="form-control @error('sks_matkul') is-invalid @enderror">
        
                                        @error('sks_matkul')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                
                            </div>

                            <div class="form-group">
                                <label>PRODI</label>
                                <select class="form-control select-category @error('prodi_id') is-invalid @enderror"
                                    name="prodi_id">
                                    <option value="">-- PILIH PRODI --</option>
                                    @foreach ($prodis as $prodi)
                                        @if($kurikulum->prodi_id == $prodi->id)
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
