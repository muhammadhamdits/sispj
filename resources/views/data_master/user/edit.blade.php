@extends('../../_templates/layout')

@section('content')
<div class="main">
    <!-- OVERVIEW -->
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Edit data {{ $user->name }}</h3>
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
            <form action="{{ route('admin.user.update', ['id' => $user->id]) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="name">Name : </label>
                    <input class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" placeholder="Type full name here..." type="text" id="name">

                    @error('name')
                        <div class="invalid-feedback text-danger">{{ $message = "Isi nama user terlebih dahulu!" }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="username">Username : </label>
                    <input class="form-control @error('username') is-invalid @enderror" name="username" value="{{ $user->username }}" placeholder="Type preferred username here..." type="text" id="username">

                    @error('username')
                        <div class="invalid-feedback text-danger">{{ $message = "Isi username terlebih dahulu!" }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password : </label>
                    <input class="form-control" name="password" placeholder="(Leave blank if you not want to change it)" type="password" id="password">
                </div>
                <div class="form-group">
                    <label for="role">Role : </label>
                    <select name="role" id="role" class="form-control @error('role') is-invalid @enderror">
                        <option value="null" disabled>Pilih role user</option>
                        @if($user->role == 0)
                        <option value="0" selected>Admin</option>
                        <option value="1">Operator</option>
                        @else
                        <option value="0">Admin</option>
                        <option value="1" selected>Operator</option>
                        @endif
                    </select>

                    @error('role')
                        <div class="invalid-feedback text-danger">{{ $message = "Pilih role user terlebih dahulu!" }}</div>
                    @enderror
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
