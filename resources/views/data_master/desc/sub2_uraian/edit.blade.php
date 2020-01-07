@extends('../../_templates/layout')

@section('content')
<div class="main">
    <!-- OVERVIEW -->
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Edit data {{ $sub2Uraian->nama }}</h3>
            <div class="text-right">
                <a class="btn btn-success update-pro" href="{{ route('admin.uraian.index', ['tabName' => 'sub2uraian']) }}" title="Kembali"><i class="fa fa-arrow-left"></i> <span> Kembali</span></a>
            </div>
        </div>

        <div class="panel-body">
            @if(session('status'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <i class="fa fa-edit"></i> {{ session('status') }}
                </div>
            @elseif(session('warning'))
                <div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <i class="fa fa-warning"></i> {{ session('warning') }}
                </div>
            @elseif(session('danger'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <i class="fa fa-warning"></i> {{ session('danger') }}
                </div>
            @endif

            <form action="{{ route('admin.sub2_uraian.update', ['sub2Uraian' => $sub2Uraian]) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="rekening">Rekening : </label>
                    <input class="form-control  @error('rekening') is-invalid @enderror" name="rekening" placeholder="Masukkan rekening kegiatan..." type="text" id="rekening" value="{{ $sub2Uraian->rekening }}">

                    @error('rekening')
                        <div class="invalid-feedback text danger">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="sub_uraian_id">Sub Uraian : </label>
                    <select name="sub_uraian_id" id="sub_uraian_id" class="form-control @error('sub_uraian_id') is-invalid @enderror">
                        <option value="null" disabled>Pilih Sub Uraian...</option>
                        @foreach($subUraians as $subUraian)
                            @if($subUraian->id == $sub2Uraian->sub_uraian_id)
                                <option selected value="{{ $subUraian->id }}">{{ $subUraian->nama }}</option>
                            @else
                                <option value="{{ $subUraian->id }}">{{ $subUraian->nama }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="nama">Nama Sub2 Uraian : </label>
                    <input class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Masukkan nama kegiatan..." type="text" id="nama" value="{{ $sub2Uraian->nama }}">

                    @error('nama')
                        <div class="invalid-feedback text danger">{{ $message }}</div>
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
