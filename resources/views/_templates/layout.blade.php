@extends('_templates/master')

@section('navbar')
@include('_templates/navbar')
@endsection

@section('sidebar')
@include('_templates/sidebar')
@endsection

@section('main')
<!-- MAIN CONTENT -->
<div class="main-content">
    <div class="container-fluid">
        @yield('content')
    </div>
</div>
<!-- END MAIN CONTENT -->
@endsection