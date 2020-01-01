@extends('../../_templates/layout')

@section('content')
<div class="main">
    <!-- OVERVIEW -->
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Add data uraian</h3>
            <div class="text-right">
                <a class="btn btn-success update-pro" href="{{ route('admin.uraian.index') }}" title="Back"><i class="fa fa-arrow-left"></i> <span> Back</span></a>
            </div>
        </div>
        <div class="panel-body">
            <form action="{{ route('admin.uraian.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="kode_rekening">Kode Rekening : </label>
                    <input class="form-control" name="kode_rekening" placeholder="Masukkan kode rekening..." type="text" required id="kode_rekening">
                </div>
                <div class="form-group">
                    <label for="uraian">Uraian : </label>
                    <input class="form-control" name="uraian" placeholder="Masukkan uraian..." type="text" required id="uraian">
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
