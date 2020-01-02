@extends('../../../_templates/layout')

@section('content')
<div class="main">
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Data {{ $program->nama }}</h3>
            <p class="panel-subtitle">Periode: <b>{{ $program->urusan->periode->tahun }} - {{ $program->urusan->periode->jenis == 0 ? 'Sebelum perubahan' : 'Setelah perubahan' }}</b></p>
            <div class="text-right">
                <a class="btn btn-success update-pro" href="{{ route('admin.utama.index', ['tabName' => 'program']) }}" title="Kembali"><i class="fa fa-arrow-left"></i> <span> Kembali</span></a>
            </div>
        </div>
        <div class="panel-body">
            <div class="form-group">
                <label for="urusan">Urusan: </label>
                <input class="form-control transparent" disabled value="{{ $program->urusan->nama }}">
            </div>
            <div class="form-group">
                <label for="organisasi">Organisasi: </label>
                <input class="form-control transparent" disabled value="{{ $program->organisasi->nama }}">
            </div>
            <div class="form-group">
                <label for="kode">Kode Program: </label>
                <input class="form-control transparent" disabled value="{{ $program->urusan->kode.'.'.$program->organisasi->kode.'.'.$program->kode }}">
            </div>
            <div class="form-group">
                <label for="nama">Nama Program : </label>
                <input class="form-control transparent" disabled value="{{ $program->nama }}">
            </div>
            <br>
        </div>
    </div>
</div>
@endsection