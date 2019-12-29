@extends('../../_templates/layout')

@section('content')
<div class="main">
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Data {{ $user->name }}</h3>
            <div class="text-right">
                <a class="btn btn-success update-pro" href="{{ route('admin.user.index') }}" title="Back"><i class="fa fa-arrow-left"></i> <span> Back</span></a>
            </div>
        </div>
        <div class="panel-body">
            <div class="form-group">
                <label for="name">Name : </label>
                <input class="form-control transparent" disabled value="{{ $user->name }}">
            </div>
            <div class="form-group">
                <label for="username">Username : </label>
                <input class="form-control transparent" disabled value="{{ $user->username }}">
            </div>
            <div class="form-group">
                <label for="role">Role : </label>
                <input class="form-control transparent" disabled value="{{ $user->role == 0 ? 'Admin' : 'Operator' }}">
            </div>
            <br>
        </div>
    </div>
</div>
@endsection