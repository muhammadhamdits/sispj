@extends('../../_templates/layout')

@section('content')
<div class="main">
    <!-- OVERVIEW -->
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Edit data {{ $organisasi->nama }}</h3>
            <div class="text-right">
                <a class="btn btn-success update-pro" href="{{ route('admin.organisasi.index') }}" title="Back"><i class="fa fa-arrow-left"></i> <span> Back</span></a>
            </div>
        </div>
        <div class="panel-body">
            <form action="{{ route('admin.organisasi.update', ['id' => $organisasi->id]) }}" method="post">
                @csrf
                @method('PATCH')
                
                <div class="form-group">
                    <label for="id">Kode : </label>
                    <input class="form-control" name="kode" value="{{ $organisasi->kode }}" placeholder="Type preferred kode here..." type="text" required id="kode">
                </div>
                <div class="form-group">
                    <label for="nama">Name : </label>
                    <input class="form-control" name="name" value="{{ $organisasi->nama }}" placeholder="Type preferred name here..." type="text" required id="name">
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
