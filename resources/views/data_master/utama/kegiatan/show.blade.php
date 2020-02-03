@extends('../../../_templates/layout')

@section('content')
<div class="main">
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Data Kegiatan {{ $kegiatan->nama }}</h3>
            <div class="text-right">
                <a class="btn btn-success update-pro" href="{{ route('admin.utama.index', ['tabName' => 'kegiatan']) }}" title="Back"><i class="fa fa-arrow-left"></i> <span> Back</span></a>
            </div>
        </div>
        <div class="panel-body">
            <div class="form-group">
                <label for="kode">Kode Kegiatan : </label>
                <input class="form-control transparent" disabled value="{{ $kegiatan->program->urusan->kode.'.'.$kegiatan->program->organisasi->kode.'.'.$kegiatan->program->kode.'.'.$kegiatan->kode }}">
            </div>
            <div class="form-group">
                <label for="kode">Urusan : </label>
                <input class="form-control transparent" disabled value="{{ $kegiatan->program->urusan->nama }}">
            </div>
            <div class="form-group">
                <label for="kode">Organisasi : </label>
                <input class="form-control transparent" disabled value="{{ $kegiatan->program->organisasi->nama }}">
            </div>
            <div class="form-group">
                <label for="kode">Program : </label>
                <input class="form-control transparent" disabled value="{{ $kegiatan->program->nama }}">
            </div>
            <div class="form-group">
                <label for="nama">Nama Kegiatan : </label>
                <input class="form-control transparent" disabled value="{{ $kegiatan->nama }}">
            </div>
            <div class="form-group">
                <label for="nama">Lokasi Kegiatan : </label>
                <input class="form-control transparent" disabled value="{{ $kegiatan->lokasi }}">
            </div>
            
            <br>
        </div>
    </div>
</div>
@endsection