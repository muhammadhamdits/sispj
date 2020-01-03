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
            <form action="{{ route('admin.sub2_uraian.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="kode">Rekening : </label>
                    <input class="form-control  @error('kode') is-invalid @enderror" name="kode" placeholder="Masukkan kode kegiatan..." type="text" id="kode" value="{{ old('kode') }}">

                    @error('kode')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="program_id">Program : </label>
                    <select name="program_id" id="program_id" class="form-control @error('program_id') is-invalid @enderror">
                        @foreach($programs as $program)
                        <option value="null" disabled selected>Pilih Program...</option>
                        <option value="{{ $program->id }}">{{ $program->nama }}</option>
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
                    <input type="hidden" name="periode_id" value="{{ $data->id }}">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
