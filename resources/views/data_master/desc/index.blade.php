@extends('../../_templates/layout')

@section('content')
<div class="main">
    <!-- OVERVIEW -->
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Kelola data Uraian</h3>
        </div>
        <div class="panel-body">
            <!-- TABBED CONTENT -->
            <div class="custom-tabs-line tabs-line-bottom left-aligned">
                <ul class="nav" role="tablist">
                    <li class="{{ isset($_GET['tabName']) ? '' : 'active' }}"><a href="#tab-uraian" role="tab" data-toggle="tab">Uraian</a></li>
                    <li class="{{ isset($_GET['tabName']) ? $_GET['tabName'] == 'suburaian' ? 'active' : '' : '' }}"><a href="#tab-suburaian" role="tab" data-toggle="tab">Sub Uraian</a></li>
                    <li class="{{ isset($_GET['tabName']) ? $_GET['tabName'] == 'sub2uraian' ? 'active' : '' : '' }}"><a href="#tab-sub2uraian" role="tab" data-toggle="tab">Sub 2 Uraian</a></li>
                    <li class="{{ isset($_GET['tabName']) ? $_GET['tabName'] == 'sub3uraian' ? 'active' : '' : '' }}"><a href="#tab-sub3uraian" role="tab" data-toggle="tab">Sub 3 Uraian</a></li>
                    <li class="{{ isset($_GET['tabName']) ? $_GET['tabName'] == 'sub4uraian' ? 'active' : '' : '' }}"><a href="#tab-sub4uraian" role="tab" data-toggle="tab">Sub 4 Uraian</a></li>
                </ul>
            </div>
            <div class="tab-content">
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

                <!-- Konten tab uraian -->
                <div class="tab-pane fade in {{ isset($_GET['tabName']) ? '' : 'active' }} row" id="tab-uraian">
                    <div class="text-right">
                        <a class="fab btn-success update-pro" href="{{ route('admin.uraian.create') }}" title="Tambah data sub uraian"><i class="fa fa-plus"></i> <span> Tambah Data</span></a>
                    </div>
           
                    <div class="table-responsive">
                        <table class="table project-table text-center" id="tabel-uraian">
                            <thead>
                                <tr>
                                    <th class="text-left">No</th>
                                    <th class="text-left">Rekening</th>
                                    <th class="text-left">Nama</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($uraians as $uraian)
                                <tr>
                                    <td class="text-left">{{ $loop->iteration }}</td>
                                    <td class="text-left">{{ $uraian->rekening }}</td>
                                    <td class="text-left">{{ $uraian->nama }}</td>
                                    <td>
                                        <a href="{{ route('admin.uraian.show', $uraian->id) }}" class="btn btn-success btn-xs"><i class="fa fa-eye"></i> Lihat</a>
                                        <a href="{{ route('admin.uraian.edit', $uraian->id) }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                                        <form style="display: inline" id="data-{{ '1'.$uraian->id }}" method="POST" action="{{ route('admin.uraian.destroy', $uraian->id) }}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                        </form>
                                        <button type="submit" onclick="remove({{ '1'.$uraian->id }})" class="btn btn-danger btn-xs" value="Delete user"><i class="fa fa-trash"></i> Hapus</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
               
                <!-- Konten tab sub uraian -->
                <div class="tab-pane fade in row {{ isset($_GET['tabName']) ? $_GET['tabName'] == 'suburaian' ? 'active' : '' : '' }}" id="tab-suburaian">
                    <div class="text-right">
                        <a class="fab btn-success update-pro" href="{{ route('admin.sub_uraian.create') }}" title="Tambah data sub uraian"><i class="fa fa-plus"></i> <span> Tambah Data</span></a>
                    </div>
                    <div class="table-responsive">
                        <table class="table project-table text-center" id="tabel-suburaian">
                            <thead>
                                <tr>
                                    <th class="text-left">No</th>
                                    <th class="text-left">Rekening</th>
                                    <th class="text-left">Nama</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sub_uraians as $sub_uraian)
                                <tr>
                                    <td class="text-left">{{ $loop->iteration }}</td>
                                    <td class="text-left">{{ $sub_uraian->uraian->rekening.".".$sub_uraian->rekening }}</td>
                                    <td class="text-left">{{ $sub_uraian->nama }}</td>
                                    <td>
                                        <a href="{{ route('admin.sub_uraian.show', $sub_uraian->id) }}" class="btn btn-success btn-xs"><i class="fa fa-eye"></i> View</a>
                                        <a href="{{ route('admin.sub_uraian.edit', $sub_uraian->id) }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                                        <form style="display: inline" id="data-{{ '2'.$sub_uraian->id }}" method="POST" action="{{ route('admin.sub_uraian.destroy', $sub_uraian->id) }}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                        </form>
                                        <button type="submit" onclick="remove({{ '2'.$sub_uraian->id }})" class="btn btn-danger btn-xs" value="Delete user"><i class="fa fa-trash"></i> Hapus</button>
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
                        <a class="fab btn-success update-pro" href="{{ route('admin.sub2_uraian.create') }}" title="Tambah data sub2 uraian"><i class="fa fa-plus"></i> <span> Tambah Data</span></a>
                    </div>
                    <div class="table-responsive">
                        <table class="table project-table text-center" id="tabel-sub2uraian">
                            <thead>
                                <tr>
                                    <th class="text-left">No</th>
                                    <th class="text-left">Rekening</th>
                                    <th class="text-left">Nama</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sub2_uraians as $sub2_uraian)
                                <tr>
                                    <td class="text-left">{{ $loop->iteration }}</td>
                                    <td class="text-left">{{ $sub2_uraian->subUraian->uraian->rekening.".".$sub2_uraian->subUraian->rekening.".".$sub2_uraian->rekening }}</td>
                                    <td class="text-left">{{ $sub2_uraian->nama }}</td>
                                    <td>
                                        <a href="{{ route('admin.sub2_uraian.show', $sub2_uraian->id) }}" class="btn btn-success btn-xs"><i class="fa fa-eye"></i> Lihat</a>
                                        <a href="{{ route('admin.sub2_uraian.edit', $sub2_uraian->id) }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                                        <form style="display: inline" method="POST" id="data-{{ '3'.$sub2_uraian->id }}" action="{{ route('admin.sub2_uraian.destroy', $sub2_uraian->id) }}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                        </form>
                                        <button type="submit" onclick="remove({{ '3'.$sub2_uraian->id }})" class="btn btn-danger btn-xs" value="Delete user"><i class="fa fa-trash"></i> Hapus</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Konten tab sub3 uraian -->
                <div class="tab-pane fade in row {{ isset($_GET['tabName']) ? $_GET['tabName'] == 'sub3uraian' ? 'active' : '' : '' }}" id="tab-sub3uraian">
                    <div class="text-right">
                        <a class="fab btn-success update-pro" href="{{ route('admin.sub3_uraian.create') }}" title="Tambah data sub3 uraian"><i class="fa fa-plus"></i> <span> Tambah Data</span></a>
                    </div>
                    <div class="table-responsive">
                        <table class="table project-table text-center" id="tabel-sub3uraian">
                            <thead>
                                <tr>
                                    <th class="text-left">No</th>
                                    <th class="text-left">Rekening</th>
                                    <th class="text-left">Nama</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sub3_uraians as $sub3_uraian)
                                <tr>
                                    <td class="text-left">{{ $loop->iteration }}</td>
                                    <td class="text-left">{{ $sub3_uraian->sub2Uraian->subUraian->uraian->rekening.".".$sub3_uraian->sub2Uraian->subUraian->rekening.".".$sub3_uraian->sub2Uraian->rekening.".".$sub3_uraian->rekening }}</td>
                                    <td class="text-left">{{ $sub3_uraian->nama }}</td>
                                    <td>
                                        <a href="{{ route('admin.sub3_uraian.show', $sub3_uraian->id) }}" class="btn btn-success btn-xs"><i class="fa fa-eye"></i> Lihat</a>
                                        <a href="{{ route('admin.sub3_uraian.edit', $sub3_uraian) }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                                        <form style="display: inline" method="POST" id="data-{{ '4'.$sub3_uraian->id }}" action="{{ route('admin.sub3_uraian.destroy', $sub3_uraian) }}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                        </form>
                                        <button type="submit" onclick="remove({{ '4'.$sub3_uraian->id }})" class="btn btn-danger btn-xs" value="Delete user"><i class="fa fa-trash"></i> Hapus</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Konten tab sub4 uraian -->
                <div class="tab-pane fade in row {{ isset($_GET['tabName']) ? $_GET['tabName'] == 'sub4uraian' ? 'active' : '' : '' }}" id="tab-sub4uraian">
                    <div class="text-right">
                        <a class="fab btn-success update-pro" href="{{ route('admin.sub4uraian.create') }}" title="Tambah data sub4uraian"><i class="fa fa-plus"></i> <span> Tambah Data</span></a>
                    </div>
                    <div class="table-responsive">
                        <table class="table project-table text-center" id="tabel-sub4uraian">
                            <thead>
                                <tr>
                                    <th class="text-left">No</th>
                                    <th class="text-left">Rekening</th>
                                    <th class="text-left">Nama</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sub4uraians as $sub4uraian)
                                    <tr>
                                        <td class="text-left">{{ $loop->iteration }}</td>
                                        <td class="text-left">{{ $sub4uraian->sub3Uraian->sub2Uraian->subUraian->uraian->rekening.".".$sub4uraian->sub3Uraian->sub2Uraian->subUraian->rekening.".".$sub4uraian->sub3Uraian->sub2Uraian->rekening.".".$sub4uraian->sub3Uraian->rekening.".".$sub4uraian->rekening }}</td>
                                        <td class="text-left">{{ $sub4uraian->nama }}</td>
                                        <td>
                                            <a href="{{ route('admin.sub4uraian.show', $sub4uraian->id) }}" class="btn btn-success btn-xs"><i class="fa fa-eye"></i> Lihat</a>
                                            <a href="{{ route('admin.sub4uraian.edit', $sub4uraian->id) }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                                            <form style="display: inline" method="POST" id="data-{{ '5'.$sub4uraian->id }}" action="{{ route('admin.sub4uraian.destroy', $sub4uraian->id) }}">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                            </form>
                                            <button type="submit" onclick="remove({{ '5'.$sub4uraian->id }})" class="btn btn-danger btn-xs" value="Delete user"><i class="fa fa-trash"></i> Hapus</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
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