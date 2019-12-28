@extends('../../_templates/layout')

@section('content')
<div class="main">
    <!-- OVERVIEW -->
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Add data user</h3>
            <p class="panel-subtitle">Period: Oct 14, 2016 - Oct 21, 2016</p>
        </div>
        <div class="panel-body">
            <form action="{{ route('admin.user.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Name : </label>
                    <input class="form-control" name="name" placeholder="Type full name here..." type="text" required id="name">
                </div>
                <div class="form-group">
                    <label for="username">Username : </label>
                    <input class="form-control" name="username" placeholder="Type preferred username here..." type="text" required id="username">
                </div>
                <div class="form-group">
                    <label for="password">Password : </label>
                    <input class="form-control" name="password" placeholder="Type preferred password here" type="password" required id="password">
                </div>
                <div class="form-group">
                    <label for="role">Role : </label>
                    <select name="role" required id="role" class="form-control">
                        <option value="0">Admin</option>
                        <option value="1">Operator</option>
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
