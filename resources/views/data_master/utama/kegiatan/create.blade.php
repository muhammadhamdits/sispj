@extends('../../_templates/layout')

@section('content')
<div class="main">
    <!-- OVERVIEW -->
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Tambah Data Kegiatan</h3>
            <p class="panel-subtitle">Periode: <b>{{ $data->tahun }} - {{ $data->jenis == 0 ? 'Sebelum perubahan' : 'Setelah perubahan' }}</b></p>
            <div class="text-right">
                <a class="btn btn-success update-pro" href="{{ route('admin.utama.index', ['tabName' => 'kegiatan']) }}" title="Back"><i class="fa fa-arrow-left"></i> <span> Kembali</span></a>
            </div>
        </div>
        <div class="panel-body">
            @if(session('status'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <i class="fa fa-check-circle"></i> {{ session('status') }}
                </div>
            @elseif(session('warning'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <i class="fa fa-edit"></i> {{ session('warning') }}
                </div>
            @elseif(session('danger'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <i class="fa fa-trash"></i> {{ session('danger') }}
                </div>
            @endif
            <form action="{{ route('admin.kegiatan.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="kode">Kode Kegiatan : </label>
                    <input class="form-control  @error('kode') is-invalid @enderror" name="kode" placeholder="Masukkan kode kegiatan..." type="text" id="kode" value="{{ old('kode') }}">

                    @error('kode')
                        <div class="invalid-feedback text-danger">{{ $message = "Isi kode kegiatan terlebih dahulu!" }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="program_id">Program : </label>
                    <select name="program_id" id="program_id" class="form-control @error('program_id') is-invalid @enderror">
                        <option value="null" disabled selected>Pilih Program...</option>
                        @foreach($programs as $program)
                        <option value="{{ $program->id }}">{{ $program->nama }}</option>
                        @endforeach
                    </select>
                    
                    @error('program_id')
                        <div class="invalid-feedback text-danger">{{ $message = "Pilih program terlebih dahulu!" }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="nama">Nama Kegiatan : </label>
                    <input class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Masukkan nama kegiatan..." type="text" id="nama" value="{{ old('nama') }}">

                    @error('nama')
                        <div class="invalid-feedback text-danger">{{ $message = "Isi nama kegiatan terlebih dahulu!" }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="lokasi">Lokasi Kegiatan : </label>
                    <input class="form-control @error('lokasi') is-invalid @enderror" name="lokasi" placeholder="Masukkan lokasi kegiatan..." type="text" id="lokasi" value="{{ old('lokasi') }}">

                    @error('lokasi')
                        <div class="invalid-feedback text-danger">{{ $message = "Isi lokasi kegiatan terlebih dahulu!" }}</div>
                    @enderror
                </div>

                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="capaian_tok">Capaian Kegiatan (Tolok Ukur Kinerja) : </label>
                        <input class="form-control" name="capaian_tok" placeholder="Masukkan tolok ukur kinerja capaian kegiatan..." type="text" id="capaian_tok" value="{{ old('capaian_tok') }}">
                    </div>
                    <div class="col-md-6">
                        <label for="capaian_tk">Capaian Kegiatan (Target Kinerja) : </label>
                        <input class="form-control" name="capaian_tk" placeholder="Masukkan target kinerja capaian kegiatan..." type="text" id="capaian_tk" value="{{ old('capaian_tk') }}">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="keluaran_tok">Keluaran Kegiatan (Tolok Ukur Kinerja) : </label>
                        <input class="form-control" name="keluaran_tok" placeholder="Masukkan tolok ukur kinerja keluaran kegiatan..." type="text" id="keluaran_tok" value="{{ old('keluaran_tok') }}">
                    </div>
                    <div class="col-md-6">
                        <label for="keluaran_tk">Keluaran Kegiatan (Target Kinerja) : </label>
                        <input class="form-control" name="keluaran_tk" placeholder="Masukkan target kinerja keluaran kegiatan..." type="text" id="keluaran_tk" value="{{ old('keluaran_tk') }}">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="hasil_tok">Hasil Kegiatan (Tolok Ukur Kinerja) : </label>
                        <input class="form-control" name="hasil_tok" placeholder="Masukkan tolok ukur kinerja Hasil kegiatan..." type="text" id="hasil_tok" value="{{ old('hasil_tok') }}">
                    </div>
                    <div class="col-md-6">
                        <label for="hasil_tk">Hasil Kegiatan (Target Kinerja) : </label>
                        <input class="form-control" name="hasil_tk" placeholder="Masukkan target kinerja Hasil kegiatan..." type="text" id="hasil_tk" value="{{ old('hasil_tk') }}">
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <input type="hidden" name="periode_id" value="{{ $data->id }}">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
