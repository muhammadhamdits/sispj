@extends('../../../_templates/layout')

@section('content')
<div class="main">
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Data Kegiatan {{ $kegiatan->nama }}</h3>
            <div class="text-right">
                <a class="btn btn-success update-pro" href="{{ route('admin.organisasi.index') }}" title="Back"><i class="fa fa-arrow-left"></i> <span> Back</span></a>
            </div>
        </div>
        <div class="panel-body">
        
            <div class="form-group">
                <label for="kode">Kode : </label>
                <input class="form-control transparent" disabled value="{{ $kegiatan->kode }}">
            </div>
            <div class="form-group">
                <label for="nama">Nama Kegiatan : </label>
                <input class="form-control transparent" disabled value="{{ $kegiatan->nama }}">
            </div>
            
            <br>
        </div>
    </div>
</div>
@endsection