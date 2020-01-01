@extends('../../../_templates/layout')

@section('content')
<div class="main">
    <!-- OVERVIEW -->
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Tambah data Organisasi</h3>
            <p class="panel-subtitle">Periode: <b>{{ $data->tahun }} - {{ $data->jenis == 0 ? 'Sebelum perubahan' : 'Setelah perubahan' }}</b></p>
            <div class="text-right">
                <a class="btn btn-success update-pro" href="{{ route('admin.utama.index') }}" title="Back"><i class="fa fa-arrow-left"></i> <span> Kembali</span></a>
            </div>
        </div>
        <div class="panel-body">
            <form action="{{ route('admin.organisasi.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="kode">Kode Organisasi : </label>
                    <input class="form-control" name="kode" placeholder="Masukkan kode organisasi..." type="text" required id="kode">
                </div>
                <div class="form-group">
                    <label for="nama">Nama Organisasi : </label>
                    <input class="form-control" name="nama" placeholder="Masukkan nama organisasi..." type="text" required id="nama">
                </div>                
                <br>
                <div class="form-group">
                    <input type="hidden" name="periode_id" value="{{ $data->id }}">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
