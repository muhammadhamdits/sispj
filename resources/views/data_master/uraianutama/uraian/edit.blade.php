@extends('../../../_templates/layout')

@section('content')
<div class="main">
    <!-- OVERVIEW -->
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Edit data {{ $uraian->nama }}</h3>
            
            <div class="text-right">
                <a class="btn btn-success update-pro" href="{{ route('admin.uraian.index') }}" title="Back"><i class="fa fa-arrow-left"></i> <span> Kembali</span></a>
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
            <form action="{{ route('admin.uraian.update', ['id' => $uraian->id]) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="id">Kode uraian : </label>
                    <input class="form-control @error('rekening') is-invalid @enderror" name="rekening" value="{{ $uraian->rekening }}" placeholder="Ketikkan rekening uraian di sini..." type="text" id="rekening">

                    @error('rekening')
                        <div class="invalid-feedback text-danger">{{ $message = "Kode uraian Wajib diisi!" }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nama">Nama uraian : </label>
                    <input class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ $uraian->nama }}" placeholder="Ketikkan nama uraian di sini..." type="text" id="name">

                    @error('nama')
                        <div class="invalid-feedback text-danger">{{ $message = "Nama uraian Wajib diisi!" }}</div>
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
