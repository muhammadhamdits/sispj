@extends('../../_templates/layout')

@section('content')
<div class="main">
    <!-- OVERVIEW -->
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Tambah data Urusan</h3>
            <p class="panel-subtitle">Periode: <b>{{ $data->tahun }} - {{ $data->jenis == 0 ? 'Sebelum perubahan' : 'Setelah perubahan' }}</b></p>
            <div class="text-right">
                <a class="btn btn-success update-pro" href="{{ route('admin.utama.index', ['tabName' => 'urusan']) }}" title="Back"><i class="fa fa-arrow-left"></i> <span> Kembali</span></a>
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
            <form action="{{ route('admin.urusan.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="kode">Kode Urusan : </label>
                    <input class="form-control @error('kode') is-invalid @enderror" name="kode" placeholder="Masukkan kode urusan..." type="text" id="kode">

                    @error('kode')
                        <div class="invalid-feedback text-danger">{{ $message = "Kode urusan Wajib diisi!" }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nama">Nama Urusan : </label>
                    <input class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Masukkan nama urusan..." type="text" id="nama">

                    @error('nama')
                        <div class="invalid-feedback text-danger">{{ $message = "Nama urusan Wajib diisi!" }}</div>
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
