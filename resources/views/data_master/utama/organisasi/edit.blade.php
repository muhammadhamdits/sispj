@extends('../../../_templates/layout')

@section('content')
<div class="main">
    <!-- OVERVIEW -->
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Edit data {{ $organisasi->nama }}</h3>
            <p class="panel-subtitle">Periode: <b>{{ $organisasi->periode->tahun }} - {{ $organisasi->periode->jenis == 0 ? 'Sebelum perubahan' : 'Setelah perubahan' }}</b></p>
            <div class="text-right">
                <a class="btn btn-success update-pro" href="{{ route('admin.utama.index') }}" title="Back"><i class="fa fa-arrow-left"></i> <span> Kembali</span></a>
            </div>
        </div>
        <div class="panel-body">
            <form action="{{ route('admin.organisasi.update', ['id' => $organisasi->id]) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="id">Kode Organisasi : </label>
                    <input class="form-control" name="kode" value="{{ $organisasi->kode }}" placeholder="Ketikkan kode organisasi di sini..." type="text" required id="kode">
                </div>
                <div class="form-group">
                    <label for="nama">Nama Organisasi : </label>
                    <input class="form-control" name="name" value="{{ $organisasi->nama }}" placeholder="Ketikkan nama organisasi di sini..." type="text" required id="name">
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
