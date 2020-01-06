@extends('../../_templates/layout')

@section('content')
<div class="main">
    <!-- OVERVIEW -->
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Tambah Data Sub2 Uraian</h3>
            <div class="text-right">
                <a class="btn btn-success update-pro" href="{{ route('admin.uraian.index', ['tabName' => 'sub2uraian']) }}" title="Back"><i class="fa fa-arrow-left"></i> <span> Kembali</span></a>
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

            <form action="{{ route('admin.sub2_uraian.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="rekening">Rekening : </label>
                    <input class="form-control  @error('rekening') is-invalid @enderror" name="rekening" placeholder="Masukkan rekening kegiatan..." type="text" id="rekening" value="{{ old('rekening') }}">

                    @error('rekening')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="sub_uraian_id">Sub Uraian : </label>
                    <select name="sub_uraian_id" id="sub_uraian_id" class="form-control @error('sub_uraian_id') is-invalid @enderror">
                        @foreach($subUraians as $subUraian)
                        <option value="null" disabled selected>Pilih Sub Uraian...</option>
                        <option value="{{ $subUraian->id }}">{{ $subUraian->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="nama">Nama Sub2 Uraian : </label>
                    <input class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Masukkan nama kegiatan..." type="text" id="nama" value="{{ old('nama') }}">

                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
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
