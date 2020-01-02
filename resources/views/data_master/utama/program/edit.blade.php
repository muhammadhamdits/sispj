@extends('../../_templates/layout')

@section('content')
<div class="main">
    <!-- OVERVIEW -->
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Edit data {{ $program->nama }}</h3>
            <p class="panel-subtitle">Periode: <b>{{ $program->urusan->periode->tahun }} - {{ $program->urusan->periode->jenis == 0 ? 'Sebelum perubahan' : 'Setelah perubahan' }}</b></p>
            <div class="text-right">
                <a class="btn btn-success update-pro" href="{{ route('admin.utama.index', ['tabName' => 'program']) }}" title="Kembali"><i class="fa fa-arrow-left"></i> <span> Kembali</span></a>
            </div>
        </div>
        <div class="panel-body">
            <form action="{{ route('admin.program.update', ['id' => $program->id]) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="urusan_id">Urusan : </label>
                    <select class="form-control" name="urusan_id" id="urusan_id">
                    @foreach($data->urusan as $urusan)
                        @if($urusan->id == $program->urusan_id)
                        <option selected value="{{ $urusan->id }}">{{ $urusan->nama }}</option>
                        @else
                        <option value="{{ $urusan->id }}">{{ $urusan->nama }}</option>
                        @endif
                    @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="organisasi_id">Organisasi : </label>
                    <select class="form-control" name="organisasi_id" id="organisasi_id">
                    @foreach($data->organisasi as $organisasi)
                        @if($organisasi->id == $program->organisasi_id)
                        <option selected value="{{ $organisasi->id }}">{{ $organisasi->nama }}</option>
                        @else
                        <option value="{{ $organisasi->id }}">{{ $organisasi->nama }}</option>
                        @endif
                    @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="kode">Kode program : </label>
                    <input class="form-control" name="kode" value="{{ $program->kode }}" placeholder="Masukkan kode program..." type="text" required id="kode">
                </div>
                <div class="form-group">
                    <label for="nama">Nama program : </label>
                    <input class="form-control" name="nama" value="{{ $program->nama }}" placeholder="Masukkan nama program..." type="text" required id="nama">
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
