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
            <form action="{{ route('admin.user.update', ['id' => $user->id]) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="name">Name : </label>
                    <input class="form-control" name="name" value="{{ $user->name }}" placeholder="Type full name here..." type="text" required id="name">
                </div>
                <div class="form-group">
                    <label for="username">Username : </label>
                    <input class="form-control" name="username" value="{{ $user->username }}" placeholder="Type preferred username here..." type="text" required id="username">
                </div>
                <div class="form-group">
                    <label for="password">Password : </label>
                    <input class="form-control" name="password" placeholder="(Leave blank if you not want to change it)" type="password" id="password">
                </div>
                <div class="form-group">
                    <label for="role">Role : </label>
                    <select name="role" required id="role" class="form-control">
                        @if($user->role == 0)
                        <option value="0" selected>Admin</option>
                        <option value="1">Operator</option>
                        @else
                        <option value="0">Admin</option>
                        <option value="1" selected>Operator</option>
                        @endif
                    </select>
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
