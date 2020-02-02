@extends('../../_templates/layout')

@section('content')
<div class="main">
    <!-- OVERVIEW -->
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Tambah Data Program</h3>
            <p class="panel-subtitle">Periode: <b>{{ $data->tahun }} - {{ $data->jenis == 0 ? 'Sebelum perubahan' : 'Setelah perubahan' }}</b></p>
            <div class="text-right">
                <a class="btn btn-success update-pro" href="{{ route('admin.utama.index', ['tabName' => 'program']) }}" title="Back"><i class="fa fa-arrow-left"></i> <span> Kembali</span></a>
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
            <form action="{{ route('admin.program.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="urusan_id">Urusan : </label>
                    <select name="urusan_id" id="urusan_id" class="form-control @error('urusan_id') is-invalid @enderror">
                        <option value="null" disabled selected>Pilih urusan...</option>
                        @foreach($data->urusan as $urusan)
                        <option value="{{ $urusan->id }}">{{ $urusan->nama }}</option>
                        @endforeach
                    </select>
                    
                    @error('urusan_id')
                        <div class="invalid-feedback text-danger">{{ $message = "Pilih urusan terlebih dahulu!" }}</div>
                    @enderror
                </div>
                @if(\Auth::user()->role == 0)
                <div class="form-group">
                    <label for="organisasi_id">Organisasi : </label>
                    <select name="organisasi_id" id="organisasi_id" class="form-control @error('organisasi_id') is-invalid @enderror">
                        <option value="null" disabled selected>Pilih organisasi...</option>
                        @foreach($data->organisasi as $organisasi)
                        <option value="{{ $organisasi->id }}">{{ $organisasi->nama }}</option>
                        @endforeach
                    </select>
                    
                    @error('organisasi_id')
                        <div class="invalid-feedback text-danger">{{ $message = "Pilih organisasi terlebih dahulu!" }}</div>
                    @enderror
                </div>
                @else
                <input type="hidden" name="organisasi_id" value="{{ \Auth::user()->organisasi->id }}">
                @endif
                <div class="form-group">
                    <label for="kode">Kode Program : </label>
                    <input class="form-control @error('kode') is-invalid @enderror" name="kode" placeholder="Masukkan kode program..." type="text" value="{{ old('kode') }}" id="kode">

                    @error('kode')
                        <div class="invalid-feedback text-danger">{{ $message = "Isi kode program terlebih dahulu!" }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nama">Nama Program : </label>
                    <input class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Masukkan nama program..." type="text" id="nama" value="{{ old('nama') }}">

                    @error('nama')
                        <div class="invalid-feedback text-danger">{{ $message = "Isi nama program terlebih dahulu!" }}</div>
                    @enderror
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
