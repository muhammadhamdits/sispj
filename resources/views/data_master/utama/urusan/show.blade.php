@extends('../../../_templates/layout')

@section('content')
<div class="main">
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Data {{ $urusan->nama }}</h3>
            <p class="panel-subtitle">Periode: <b>{{ $urusan->periode->tahun }} - {{ $urusan->periode->jenis == 0 ? 'Sebelum perubahan' : 'Setelah perubahan' }}</b></p>
            <div class="text-right">
                <a class="btn btn-success update-pro" href="{{ route('admin.utama.index', ['tabName' => 'urusan']) }}" title="Kembali"><i class="fa fa-arrow-left"></i> <span> Kembali</span></a>
            </div>
        </div>
        <div class="panel-body">
            <div class="form-group">
                <label for="kode">Kode Urusan: </label>
                <input class="form-control transparent" disabled value="{{ $urusan->kode}}">
            </div>
            <div class="form-group">
                <label for="nama">Nama Urusan : </label>
                <input class="form-control transparent" disabled value="{{ $urusan->nama }}">
            </div>
            <br>
        </div>
    </div>
</div>
@endsection