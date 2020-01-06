@extends('../../../_templates/layout')

@section('content')
<div class="main">
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Data Kegiatan {{ $sub2Uraian->nama }}</h3>
            <div class="text-right">
                <a class="btn btn-success update-pro" href="{{ route('admin.uraian.index', ['tabName' => 'sub2uraian']) }}" title="Back"><i class="fa fa-arrow-left"></i> <span> Back</span></a>
            </div>
        </div>
        <div class="panel-body">
        
            <div class="form-group">
                <label for="kode">Rekening : </label>
                <input class="form-control transparent" disabled value="{{ $sub2Uraian->rekening }}">
            </div>
            
            <div class="form-group">
                <label for="nama">Nama Sub2 Uraian : </label>
                <input class="form-control transparent" disabled value="{{ $sub2Uraian->nama }}">
            </div>
            
            <br>
        </div>
    </div>
</div>
@endsection