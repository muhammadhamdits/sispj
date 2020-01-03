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
            @if(session('status'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <i class="fa fa-check-circle"></i> {{ session('status') }}
                </div>
            @elseif(session('warning'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <i class="fa fa-edit"></i> {{ session('warning') }}
                </div>
            @elseif(session('danger'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <i class="fa fa-trash"></i> {{ session('danger') }}
                </div>
            @endif
            <form action="{{ route('admin.organisasi.update', ['id' => $organisasi->id]) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="id">Kode Organisasi : </label>
                    <input class="form-control @error('kode') is-invalid @enderror" name="kode" value="{{ $organisasi->kode }}" placeholder="Ketikkan kode organisasi di sini..." type="text" id="kode">

                    @error('kode')
                        <div class="invalid-feedback text-danger">{{ $message = "Kode organisasi Wajib diisi!" }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nama">Nama Organisasi : </label>
                    <input class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ $organisasi->nama }}" placeholder="Ketikkan nama organisasi di sini..." type="text" id="name">

                    @error('nama')
                        <div class="invalid-feedback text-danger">{{ $message = "Nama organisasi Wajib diisi!" }}</div>
                    @enderror
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
