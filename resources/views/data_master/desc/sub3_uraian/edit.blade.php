@extends('../../_templates/layout')

@section('content')
<div class="main">
    <!-- OVERVIEW -->
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Edit data {{ $sub3_uraian->nama }}</h3>
            <div class="text-right">
                <a class="btn btn-success update-pro" href="{{ route('admin.uraian.index', ['tabName' => 'sub3uraian']) }}" title="Kembali"><i class="fa fa-arrow-left"></i> <span> Kembali</span></a>
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
            <form action="{{ route('admin.sub3_uraian.update', ['id' => $sub3_uraian->id]) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="rekening">Rekening : </label>
                    <input class="form-control @error('rekening') is-invalid @enderror" name="rekening" value="{{ $sub3_uraian->rekening }}" placeholder="Type full rekening here..." type="text" id="rekening">

                    @error('rekening')
                        <div class="invalid-feedback text-danger">{{ $message = "Isi rekening sub uraian terlebih dahulu!" }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nama">Nama : </label>
                    <input class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ $sub3_uraian->nama }}" placeholder="Type preferred u here..." type="text" id="nama">

                    @error('nama')
                        <div class="invalid-feedback text-danger">{{ $message = "Isi nama sub3 uraian terlebih dahulu!" }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="sub2_uraian_id">Sub2 Uraian : </label>
                    <select class="form-control @error('sub2_uraian_id') is-invalid @enderror" name="sub2_uraian_id" id="sub2_uraian_id">
                        @foreach($sub2_uraians as $sub2_uraian)
                        @if($sub2_uraian->id == $sub3_uraian->sub2_uraian_id)
                        <option selected value="{{$sub2_uraian->id}}">{{$sub2_uraian->nama}}</option>
                        @else
                        <option value="{{$sub2_uraian->id}}">{{$sub2_uraian->nama}}</option>
                        @endif
                        @endforeach 
                    </select>

                    @error('sub2_uraian_id')
                        <div class="invalid-feedback text-danger">{{ $message = "Pilih sub2 uraian terlebih dahulu!" }}</div>
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
