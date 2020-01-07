@extends('../../_templates/layout')

@section('content')
<div class="main">
    <!-- OVERVIEW -->
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Tambah data Sub Uraian</h3>
            <div class="text-right">
                <a class="btn btn-success update-pro" href="{{ route('admin.uraian.index', ['tabName' => 'suburaian']) }}" title="Kembali"><i class="fa fa-arrow-left"></i> <span> Kembali</span></a>
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
            <form action="{{ route('admin.sub_uraian.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="rekening">Rekening : </label>
                    <input class="form-control @error('rekening') is-invalid @enderror" name="rekening" placeholder="Masukkan rekening..." value="{{ old('rekening') }}" type="text" id="rekening">

                    @error('rekening')
                        <div class="invalid-feedback text-danger">{{ $message = "Isi rekening sub uraian terlebih dahulu!" }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="sub_uraian">Nama : </label>
                    <input class="form-control @error('sub_uraian') is-invalid @enderror" name="sub_uraian" placeholder="Masukkan nama..." value="{{ old('sub_uraian') }}" type="text" id="sub_uraian">

                    @error('sub_uraian')
                        <div class="invalid-feedback text-danger">{{ $message = "Isi nama sub uraian terlebih dahulu!" }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="uraian_id">Uraian : </label>
                    <select class="form-control @error('uraian_id') is-invalid @enderror" name="uraian_id" id="uraian">
                        <option value="null" disabled selected>Pilih uraian...</option>
                    @foreach($uraians as $uraian)
                        <option value="{{$uraian->id}}">{{$uraian->nama}}</option>
                    @endforeach
                    </select>

                    @error('uraian_id')
                        <div class="invalid-feedback text-danger">{{ $message = "Pilih uraian terlebih dahulu!" }}</div>
                    @enderror
                </div>
                <br>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
