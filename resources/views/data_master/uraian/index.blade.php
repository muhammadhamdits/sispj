@extends('../../_templates/layout')

@section('content')
<div class="main">
    <!-- OVERVIEW -->
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Kelola data Uraian</h3>
            <p class="panel-subtitle">Periode: <b>{{ $periode->tahun }} - {{ $periode->jenis == 0 ? 'Sebelum perubahan' : 'Setelah perubahan' }}</b></p>
        </div>
        <div class="panel-body">
            <!-- TABBED CONTENT -->
            <div class="custom-tabs-line tabs-line-bottom left-aligned">
                <ul class="nav" role="tablist">
                    <li class="{{ isset($_GET['tabName']) ? '' : 'active' }}"><a href="#tab-uraian" role="tab" data-toggle="tab">Uraian</a></li>
                    <li class=""><a href="#tab-suburaian" role="tab" data-toggle="tab">Sub Uraian</a></li>
                    <li class="{{ isset($_GET['tabName']) ? $_GET['tabName'] == 'sub2uraian' ? 'active' : '' : '' }}"><a href="#tab-sub2uraian" role="tab" data-toggle="tab">Sub 2 Uraian</a></li>
                    <li class=""><a href="#tab-sub3uraian" role="tab" data-toggle="tab">Sub 3 Uraian</a></li>
                    <li class=""><a href="#tab-sub4uraian" role="tab" data-toggle="tab">Sub 4 Uraian</a></li>
                </ul>
            </div>
            <div class="tab-content">
            <br>


            @if(session('status'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <i class="fa fa-check-circle"></i> {{ session('status') }}
                </div>
            @elseif(session('warning'))
                <div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <i class="fa fa-pencil"></i> {{ session('warning') }}
                </div>
            @elseif(session('danger'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <i class="fa fa-trash"></i> {{ session('danger') }}
                </div>
            @endif


                <!-- Konten tab organisasi -->
                <div class="tab-pane fade in {{ isset($_GET['tabName']) ? '' : 'active' }} row" id="tab-uraian">
                    <div class="text-right">
                        <a class="btn btn-success update-pro" href="{{ route('admin.uraian.create') }}" title="Tambah data sub_uraian"><i class="fa fa-plus"></i> <span> Add Data</span></a>
                    </div>
           
                    <div class="table-responsive">
                        <table class="table project-table text-center">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Kode Rekening</th>
                                    <th class="text-center">Uraian</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($uraians as $uraian)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $uraian->rekening }}</td>
                                    <td>{{ $uraian->nama }}</td>
                                    <td>
                                        <a href="{{ route('admin.uraian.show', $uraian->id) }}" class="btn btn-success btn-xs"><i class="fa fa-eye"></i> View</a>
                                        <a href="{{ route('admin.uraian.edit', $uraian->id) }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                                        <form style="display: inline" method="POST" action="{{ route('admin.uraian.destroy', $uraian->id) }}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" onclick="confirm('Yakin?')" class="btn btn-danger btn-xs" value="Delete user"><i class="fa fa-trash"></i> Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
               
                <!-- Konten tab sub uraian -->
                <div class="tab-pane fade in row" id="tab-suburaian">
                    <div class="text-right">
                        <a class="btn btn-success update-pro" href="{{ route('admin.sub_uraian.create') }}" title="Tambah data organisasi"><i class="fa fa-plus"></i> <span> Add Data</span></a>
                    </div>
                    <br>
                    <div class="table-responsive">
                        <table class="table project-table text-center">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Kode Rekening</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Uraian</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sub_uraians as $sub_uraian)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $sub_uraian->rekening }}</td>
                                    <td>{{ $sub_uraian->nama }}</td>
                                    <td>{{ $sub_uraian->uraian_id }}</td>
                                    <td>
                                        <a href="{{ route('admin.sub_uraian.show', $sub_uraian->id) }}" class="btn btn-success btn-xs"><i class="fa fa-eye"></i> View</a>
                                        <a href="{{ route('admin.sub_uraian.edit', $sub_uraian->id) }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                                        <form style="display: inline" method="POST" action="{{ route('admin.sub_uraian.destroy', $sub_uraian->id) }}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" onclick="confirm('Yakin?')" class="btn btn-danger btn-xs" value="Delete user"><i class="fa fa-trash"></i> Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Konten tab sub2 uraian -->
                <div class="tab-pane fade in row {{ isset($_GET['tabName']) ? $_GET['tabName'] == 'sub2uraian' ? 'active' : '' : '' }}" id="tab-sub2uraian">
                    <div class="text-right">
                        <a class="fab update-pro" href="{{ route('admin.sub2_uraian.create') }}" title="Tambah data sub2 uraian"><i class="fa fa-plus"></i> <span> Add Data</span></a>
                    </div>
                    <br>
                    <div class="table-responsive">
                        <table class="table project-table text-center">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Kode Rekening</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Uraian</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sub2_uraians as $sub2_uraian)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $sub2_uraian->rekening }}</td>
                                    <td>{{ $sub2_uraian->nama }}</td>
                                    <td>{{ $sub2_uraian->sub_uraian_id }}</td>
                                    <td>
                                        <a href="{{ route('admin.sub2_uraian.show', $sub2_uraian->id) }}" class="btn btn-success btn-xs"><i class="fa fa-eye"></i> View</a>
                                        <a href="{{ route('admin.sub2_uraian.edit', $sub2_uraian->id) }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                                        <form style="display: inline" method="POST" action="{{ route('admin.sub2_uraian.destroy', $sub2_uraian->id) }}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" onclick="confirm('Yakin?')" class="btn btn-danger btn-xs" value="Delete user"><i class="fa fa-trash"></i> Delete</button>
                                        </form>
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