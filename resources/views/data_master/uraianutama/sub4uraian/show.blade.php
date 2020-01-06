@extends('../../../_templates/layout')

@section('content')
<div class="main">
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Data {{ $sub4uraian->nama }}</h3>
            <div class="text-right">
                <a class="btn btn-success update-pro" href="{{ route('admin.uraian.index') }}" title="Kembali"><i class="fa fa-arrow-left"></i> <span> Kembali</span></a>
            </div>
        </div>
        <div class="panel-body">
            <div class="form-group">
                <label for="kode">Kode rekening sub 4 uraian: </label>
                <input class="form-control transparent" disabled value="{{ $sub4uraian->rekening}}">
            </div>
            <div class="form-group">
                <label for="sub3uraian">Sub 3 Uraian : </label>
                <input class="form-control transparent" disabled value="{{ $sub4uraian->sub3uraian->nama }}">
            </div>
            <div class="form-group">
                <label for="nama">Sub 4 Uraian : </label>
                <input class="form-control transparent" disabled value="{{ $sub4uraian->nama }}">
            </div>
            <br>
        </div>
    </div>
</div>
@endsection