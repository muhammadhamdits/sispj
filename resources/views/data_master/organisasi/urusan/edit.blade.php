@extends('../../_templates/layout')

@section('content')
<div class="main">
    <!-- OVERVIEW -->
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Edit data {{ $urusan->urusan }}</h3>
            <div class="text-right">
                <a class="btn btn-success update-pro" href="{{ route('admin.organisasi.index') }}" title="Back"><i class="fa fa-arrow-left"></i> <span> Back</span></a>
            </div>
        </div>
        <div class="panel-body">
            <form action="{{ route('admin.urusan.update', ['id' => $urusan->id]) }}" method="post">
                @csrf
                @method('PATCH')
                  <div class="form-group">
                    <label for="rekening">Kode Rekening : </label>
                    <input class="form-control" name="rekening" value="{{ $urusan->kode }}" placeholder="Masukkan kode rekening..." type="text" required id="rekening">
                </div>
                <div class="form-group">
                    <label for="urusan">Urusan : </label>
                    <input class="form-control" name="urusan" value="{{ $urusan->nama }}" placeholder="Masukkan urusan..." type="text" required id="urusan">
                </div>
                  <div class="form-group">
                    <label for="organisasi">Organisasi : </label>
                  <select class="form-control" name="organisasi" value="{{ $urusan->organisasi_id }}" placeholder="Type preferred organisasi here..." type="text" required id="organisasi"><option value="{{ $urusan->organisasi_id }}">{{$urusan->organisasi_id }}</option></select>
                </div
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
