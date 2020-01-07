@extends('../../_templates/layout')

@section('content')
<div class="main">
    <!-- OVERVIEW -->
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Tambah Data sub4uraian</h3>
  
            <div class="text-right">
                <a class="btn btn-success update-pro" href="{{ route('admin.uraian.index', ['tabName' => 'sub4uraian']) }}" title="Back"><i class="fa fa-arrow-left"></i> <span> Kembali</span></a>
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
            <form action="{{ route('admin.sub4uraian.store') }}" method="post">
                @csrf
                <div class="form-group">
                	 <div class="form-group">
                    <label for="rekening">Kode Rekening : </label>
                    <input class="form-control @error('rekening') is-invalid @enderror" name="rekening" placeholder="Masukkan rekening program..." type="text" value="{{ old('rekening') }}" id="rekening">

                    @error('rekening')
                        <div class="invalid-feedback text-danger">{{ $message = "Isi kode program terlebih dahulu!" }}</div>
                    @enderror
                </div>
                    <label for="sub3_uraian_id">Sub 3 Uraian : </label>
                    <select name="sub3_uraian_id" id="sub3_uraian_id" class="form-control @error('sub3_uraian_id') is-invalid @enderror">
                        <option value="null" disabled selected>Pilih sub3 uraian...</option>
                        @foreach($sub3uraians as $sub3uraian)
                        <option value="{{ $sub3uraian->id }}">{{ $sub3uraian->nama }}</option>
                        @endforeach
                    </select>
                    
                    @error('sub3_uraian_id')
                        <div class="invalid-feedback text-danger">{{ $message = "Pilih Sub 3 Uraian terlebih dahulu!" }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nama">Nama sub4uraian : </label>
                    <input class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Masukkan nama sub4uraian..." type="text" id="nama" value="{{ old('nama') }}">

                    @error('nama')
                        <div class="invalid-feedback text-danger">{{ $message = "Isi nama sub4uraian terlebih dahulu!" }}</div>
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
