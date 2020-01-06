@extends('../../../_templates/layout')

@section('content')
<div class="main">
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Data {{ $uraian->nama }}</h3>
            <div class="text-right">
                <a class="btn btn-success update-pro" href="{{ route('admin.utama.index') }}" title="Kembali"><i class="fa fa-arrow-left"></i> <span> Kembali</span></a>
            </div>
        </div>
        <div class="panel-body">
            <div class="form-group">
                <label for="kode">Kode uraian: </label>
                <input class="form-control transparent" disabled value="{{ $uraian->rekening}}">
            </div>
            <div class="form-group">
                <label for="nama">Nama uraian : </label>
                <input class="form-control transparent" disabled value="{{ $uraian->nama }}">
            </div>
            <br>
        </div>
    </div>
</div>
@endsection