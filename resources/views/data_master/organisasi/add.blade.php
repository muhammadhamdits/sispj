@extends('../../_templates/layout')

@section('content')
<div class="main">
    <!-- OVERVIEW -->
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Add data Organisasi</h3>
            <div class="text-right">
                <a class="btn btn-success update-pro" href="{{ route('admin.organisasi.index') }}" title="Back"><i class="fa fa-arrow-left"></i> <span> Back</span></a>
            </div>
        </div>
        <div class="panel-body">
            <form action="{{ route('admin.organisasi.store') }}" method="post">
                @csrf
                
               
                <div class="form-group">
                    <label for="kode">Kode : </label>
                    <input class="form-control" name="kode" placeholder="Type preferred kode here..." type="text" required id="kode">
                </div>
                <div class="form-group">
                    <label for="nama">Name : </label>
                    <input class="form-control" name="name" placeholder="Type preferred name here..." type="text" required id="name">
                </div>                
                <br>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
