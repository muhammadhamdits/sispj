@extends('../../../_templates/layout')

@section('content')
<div class="main">
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Data {{ $sub_uraian->nama }}</h3>
            <div class="text-right">
                <a class="btn btn-success update-pro" href="{{ route('admin.uraian.index', ['tabName' => 'sub_uraian']) }}" title="Kembali"><i class="fa fa-arrow-left"></i> <span> Kembali</span></a>
            </div>
        </div>
        <div class="panel-body">
            <div class="form-group">
                <label for="uraian">Uraian: </label>
                <input class="form-control transparent" disabled value="{{ $sub_uraian->uraian->nama }}">
            </div>
            
            <div class="form-group">
                <label for="kode">Kode Rekening: </label>
                <input class="form-control transparent" disabled value="{{ $sub_uraian->uraian->rekening.'.'.$sub_uraian->rekening }}">
            </div>
            <div class="form-group">
                <label for="nama">Nama Program : </label>
                <input class="form-control transparent" disabled value="{{ $sub_uraian->nama }}">
            </div>
            <br>
        </div>
    </div>
</div>
@endsection