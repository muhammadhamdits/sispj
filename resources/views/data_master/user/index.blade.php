@extends('../../_templates/layout')

@section('content')
<div class="main">
    <!-- OVERVIEW -->
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Kelola data user</h3>
        </div>
        <div class="panel-body">
            <!-- TABBED CONTENT -->
            <div class="custom-tabs-line tabs-line-bottom left-aligned">
                <ul class="nav" role="tablist">
                    <li class="active"><a href="#tab-user" role="tab" data-toggle="tab">User</a></li>
                </ul>
            </div>
            @if(session('status'))
                    <br>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <i class="fa fa-check-circle"></i> {{ session('status') }}
                </div>
            @elseif(session('warning'))
                    <br>
                <div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <i class="fa fa-pencil"></i> {{ session('warning') }}
                </div>
            @elseif(session('danger'))
                    <br>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <i class="fa fa-trash"></i> {{ session('danger') }}
                </div>
            @endif
            <div class="tab-content">
                <!-- Konten tab user -->
                <div class="tab-pane fade in active row" id="tab-user">
                    <div class="text-right">
                        <a class="fab btn-success update-pro" href="{{ route('admin.user.create') }}" title="Tambah user"><i class="fa fa-plus"></i> <span> Add Data</span></a>
                    </div>
                    <div class="table-responsive">
                        <table class="table project-table text-center" id="tabel-user">
                            <thead>
                                <tr>
                                    <th class="text-left">No</th>
                                    <th class="text-left">Nama</th>
                                    <th class="text-left">Username</th>
                                    <th class="text-left">Role</th>
                                    <th class="text-left">Organisasi</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td class="text-left">{{ $loop->iteration }}</td>
                                    <td class="text-left">{{ $user->name }}</td>
                                    <td class="text-left">{{ $user->username }}</td>
                                    <td class="text-left">{{ $user->role == 0 ? 'Admin' : ($user->role == 1 ? 'Admin Organisasi' : 'Operator') }}</td>
                                    <td class="text-center">{{ $user->role == 0 ? '-' : $user->organisasi->nama }}</td>
                                    <td>
                                        <a href="{{ route('admin.user.show', $user->id) }}" class="btn btn-success btn-xs"><i class="fa fa-eye"></i> View</a>
                                        <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                                        <form style="display: inline" id="data-{{ '1'.$user->id }}" method="POST" action="{{ route('admin.user.destroy', $user->id) }}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                        </form>
                                        <button onclick="remove({{ '1'.$user->id }})" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Akhir konten masing-masing tab -->
            </div>
            <!-- END TABBED CONTENT -->
        </div>
    </div>
</div>
<!-- END OVERVIEW -->
@endsection