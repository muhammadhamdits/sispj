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
                    <label for="name">Kode Rekening : </label>
                    <input class="form-control" name="name" value="{{ $urusan->kode }}" placeholder="Type full name here..." type="text" required id="name">
                </div>
                <div class="form-group">
                    <label for="username">Urusan : </label>
                    <input class="form-control" name="username" value="{{ $urusan->nama }}" placeholder="Type preferred username here..." type="text" required id="username">
                </div>
                <div class="form-group">
                    <label for="password">Organisasi : </label>
                  <input class="form-control" name="username" value="{{ $urusan->organisasi_id }}" placeholder="Type preferred username here..." type="text" required id="username">
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
