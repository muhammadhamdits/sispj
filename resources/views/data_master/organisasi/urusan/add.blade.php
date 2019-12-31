@extends('../../_templates/layout')

@section('content')
<div class="main">
    <!-- OVERVIEW -->
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Add data Urusan</h3>
            <div class="text-right">
                <a class="btn btn-success update-pro" href="{{ route('admin.organisasi.index') }}" title="Back"><i class="fa fa-arrow-left"></i> <span> Back</span></a>
            </div>
        </div>
        <div class="panel-body">
            <form action="{{ route('admin.urusan.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="rekening">Kode Rekening : </label>
                    <input class="form-control" name="rekening" placeholder="Masukkan kode rekening..." type="text" required id="rekening">
                </div>
                <div class="form-group">
                    <label for="urusan">Urusan : </label>
                    <input class="form-control" name="urusan" placeholder="Masukkan urusan..." type="text" required id="urusan">
                </div>
                <div class="form-group">
                    <label for="organisasi">Organisasi : </label>
                    <select class="form-control" name="organisasi"  required id="organisasi">
                    @foreach($organisasis as $organisasi)
                    <option value="{{$organisasi->id}}">{{$organisasi->nama}}</option>
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
