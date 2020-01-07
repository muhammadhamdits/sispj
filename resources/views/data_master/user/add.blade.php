@extends('../../_templates/layout')

@section('content')
<div class="main">
    <!-- OVERVIEW -->
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Add data user</h3>
            <div class="text-right">
                <a class="btn btn-success update-pro" href="{{ route('admin.user.index') }}" title="Back"><i class="fa fa-arrow-left"></i> <span> Back</span></a>
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
            <form action="{{ route('admin.user.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Name : </label>
                    <input class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Type full name here..." type="text" id="name" value="{{ old('name') }}">

                    @error('name')
                        <div class="invalid-feedback text-danger">{{ $message = "Isi nama user terlebih dahulu!" }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="username">Username : </label>
                    <input class="form-control @error('username') is-invalid @enderror" name="username" placeholder="Type preferred username here..." type="text" id="username" value="{{ old('username') }}">

                    @error('username')
                        <div class="invalid-feedback text-danger">{{ $message = "Isi username terlebih dahulu!" }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password : </label>
                    <input class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Type preferred password here" type="password" id="password">

                    @error('password')
                        <div class="invalid-feedback text-danger">{{ $message = "Isi password terlebih dahulu!" }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="role">Role : </label>
                    <select name="role" id="role" class="form-control @error('role') is-invalid @enderror">
                        <option value="null" disabled selected>Pilih role user</option>
                        <option value="0">Admin</option>
                        <option value="1">Operator</option>
                    </select>

                    @error('role')
                        <div class="invalid-feedback text-danger">{{ $message = "Pilih role user terlebih dahulu!" }}</div>
                    @enderror
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
