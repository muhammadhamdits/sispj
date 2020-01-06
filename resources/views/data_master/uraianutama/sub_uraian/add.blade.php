@extends('../../_templates/layout')

@section('content')
<div class="main">
    <!-- OVERVIEW -->
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Add data Sub Uraian</h3>
            <div class="text-right">
                <a class="btn btn-success update-pro" href="{{ route('admin.uraian.index') }}" title="Back"><i class="fa fa-arrow-left"></i> <span> Back</span></a>
            </div>
        </div>
        <div class="panel-body">
            <form action="{{ route('admin.sub_uraian.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="rekening">Kode Rekening : </label>
                    <input class="form-control" name="rekening" placeholder="Masukkan kode rekening..." type="text" required id="rekening">
                </div>
                <div class="form-group">
                    <label for="sub_uraian">Nama : </label>
                    <input class="form-control" name="sub_uraian" placeholder="Masukkan nama..." type="text" required id="sub_uraian">
                </div>
                <div class="form-group">
                    <label for="sub_uraian">Uraian : </label>
                    <select class="form-control" name="uraian_id"  required id="uraian">
                    @foreach($uraians as $uraian)
                    <option value="{{$uraian->id}}">{{$uraian->nama}}</option>
                    @endforeach
                    </select>
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
