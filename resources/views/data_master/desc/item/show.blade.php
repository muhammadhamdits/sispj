@extends('../../../_templates/layout')

@section('content')
<div class="main">
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Data Item {{ $item->nama }}</h3>
            <div class="text-right">
                <a class="btn btn-success update-pro" href="{{ route('admin.uraian.index', ['tabName' => 'item']) }}" title="Kembali"><i class="fa fa-arrow-left"></i> <span> Kembali</span></a>
            </div>
        </div>
        <div class="panel-body">

            <div class="form-group">
                <label for="nama">Nama item : </label>
                <input class="form-control transparent" disabled value="{{ $item->nama }}">
            </div>
            
            <div class="form-group">
                <label for="satuan">Satuan : </label>
                <input class="form-control transparent" disabled value="{{ $item->satuan }}">
            </div>
            
        </div>
    </div>
</div>
@endsection