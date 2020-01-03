@extends('../../_templates/layout')

@section('content')
<div class="main">
    <!-- OVERVIEW -->
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Edit data {{ $kegiatan->nama }}</h3>
            <p class="panel-subtitle">Periode: <b>{{ $data->tahun }} - {{ $data->jenis == 0 ? 'Sebelum perubahan' : 'Setelah perubahan' }}</b></p>
            <div class="text-right">
                <a class="btn btn-success update-pro" href="{{ route('admin.utama.index', ['tabName' => 'kegiatan']) }}" title="Kembali"><i class="fa fa-arrow-left"></i> <span> Kembali</span></a>
            </div>
        </div>
        <div class="panel-body">
            @if(session('status'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <i class="fa fa-edit"></i> {{ session('status') }}
                </div>
            @elseif(session('warning'))
                <div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <i class="fa fa-warning"></i> {{ session('warning') }}
                </div>
            @elseif(session('danger'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <i class="fa fa-warning"></i> {{ session('danger') }}
                </div>
            @endif
            <form action="{{ route('admin.kegiatan.update', ['id' => $kegiatan->id]) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="kode">Kode Kegiatan : </label>
                    <input class="form-control @error('kode') is-invalid @enderror" name="kode" value="{{ $kegiatan->kode }}" placeholder="Masukkan kode kegiatan..." type="text" id="kode">

                    @error('kode')
                        <div class="invalid-feedback text-danger">{{ $message = "Kode kegiatan wajib diisi!" }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="program_id">Program : </label>
                    <select name="program_id" id="program_id" class="form-control @error('program_id') is-invalid @enderror">
                        <option value="null" disabled selected>Pilih Program...</option>
                        @foreach($programs as $program)
                            @if($program->id == $kegiatan->program_id)
                            <option selected value="{{ $program->id }}">{{ $program->nama }}</option>
                            @else
                            <option value="{{ $program->id }}">{{ $program->nama }}</option>
                            @endif
                        @endforeach
                    </select>

                    @error('program_id')
                        <div class="invalid-feedback text-danger">{{ $message = "Pilih program terlebih dahulu!" }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="nama">Nama Kegiatan : </label>
                    <input class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ $kegiatan->nama }}" placeholder="Masukkan nama kegiatan..." type="text" required id="nama">

                    @error('nama')
                        <div class="invalid-feedback text-danger">{{ $message = "Nama kegiatan wajib diisi!" }}</div>
                    @enderror
                </div>
                <br>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Perbaharui</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
