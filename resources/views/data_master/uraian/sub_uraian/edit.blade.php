@extends('../../_templates/layout')

@section('content')
<div class="main">
    <!-- OVERVIEW -->
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Edit data {{ $uraian->uraian }}</h3>
            <div class="text-right">
                <a class="btn btn-success update-pro" href="{{ route('admin.uraian.index') }}" title="Back"><i class="fa fa-arrow-left"></i> <span> Back</span></a>
            </div>
        </div>
        <div class="panel-body">
            <form action="{{ route('admin.sub_uraian.update', ['id' => $sub_uraian->id]) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="rekening">Kode Rekening : </label>
                    <input class="form-control" name="rekening" value="{{ $sub_uraian->rekening }}" placeholder="Type full rekening here..." type="text" required id="rekening">
                </div>
                <div class="form-group">
                    <label for="sub_uraian">Nama : </label>
                    <input class="form-control" name="nama" value="{{ $sub_uraian->nama }}" placeholder="Type preferred u here..." type="text" required id="nama">
                </div>
                <div class="form-group">
                    <label for="uraian">Uraian : </label>
                  <input class="form-control" name="uraian" value="{{ $uraian->uraian_id }}" placeholder="Type preferred Uraian here..." type="text" required id="uraian">
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
