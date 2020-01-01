@extends('../../_templates/layout')

@section('content')
<div class="main">
    <!-- OVERVIEW -->
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Edit data {{ $uraian->uraian }}</h3>
            <div class="text-right">
                <a class="btn btn-success update-pro" href="{{ route('admin.organisasi.index') }}" title="Back"><i class="fa fa-arrow-left"></i> <span> Back</span></a>
            </div>
        </div>
        <div class="panel-body">
            <form action="{{ route('admin.uraian.update', ['id' => $uraian->id]) }}" method="post">
                @csrf
                @method('PATCH')
                  <div class="form-group">
                    <label for="rekening">Kode Rekening : </label>
                    <input class="form-control" name="rekening" value="{{ $uraian->rekening }}" placeholder="Masukkan kode rekening..." type="text" required id="rekening">
                </div>
                <div class="form-group">
                    <label for="uraian">Uraian : </label>
                    <input class="form-control" name="uraian" value="{{ $uraian->nama }}" placeholder="Masukkan uraian..." type="text" required id="uraian">
                </div>
              
                  
                <br>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
