@extends('../../_templates/layout')

@section('content')
<div class="main">
    <!-- OVERVIEW -->
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Kelola data utama</h3>
            @if($data != null)
                <p class="panel-subtitle">Periode: <b>{{ $data->tahun }} - {{ $data->jenis == 0 ? 'Sebelum perubahan' : 'Setelah perubahan' }}</b></p>
            @endif
        </div>
        <div class="panel-body">
            <!-- TABBED CONTENT -->
            <div class="custom-tabs-line tabs-line-bottom left-aligned">
                <ul class="nav" role="tablist">
                    <li class="{{ isset($_GET['tabName']) ? '' : 'active' }}"><a href="#tab-organisasi" role="tab" data-toggle="tab">Organisasi</a></li>
                    <li class="{{ isset($_GET['tabName']) ? $_GET['tabName'] == 'urusan' ? 'active' : '' : '' }}"><a href="#tab-urusan" role="tab" data-toggle="tab">Urusan</a></li>
                    <li class="{{ isset($_GET['tabName']) ? $_GET['tabName'] == 'program' ? 'active' : '' : '' }}"><a href="#tab-program" role="tab" data-toggle="tab">Program</a></li>                    
                    <li class="{{ isset($_GET['tabName']) ? $_GET['tabName'] == 'kegiatan' ? 'active' : '' : '' }}"><a href="#tab-kegiatan" role="tab" data-toggle="tab">Kegiatan</a></li>
                    <li class=""><a href="#tab-periode" role="tab" data-toggle="tab">Periode</a></li>
                </ul>
            </div>
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
            <div class="tab-content">
                <!-- Konten tab organisasi -->
                <div class="tab-pane fade in row {{ isset($_GET['tabName']) ? '' : 'active' }}" id="tab-organisasi">
                    <div class="text-right">
                        <a class="fab update-pro" href="{{ route('admin.organisasi.create') }}" title="Tambah data organisasi"><i class="fa fa-plus"></i> <span> Tambah Data</span></a>
                    </div>
                    <br>
                    <div class="table-responsive">
                        <table class="table project-table text-center">
                            <thead>
                                <tr>
                                    <th class="text-left">No</th>
                                    <th class="text-left">Kode Organisasi</th>
                                    <th class="text-left">Nama Organisasi</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data->organisasi as $organisasi)
                                    <tr>
                                        <td class="text-left">{{ $loop->iteration }}</td>
                                        <td class="text-left">{{ $organisasi->kode }}</td>
                                        <td class="text-left">{{ $organisasi->nama }}</td>
                                        <td>
                                            <a href="{{ route('admin.organisasi.show', $organisasi->id) }}" class="btn btn-success btn-xs"><i class="fa fa-eye"></i> Lihat</a>
                                            <a href="{{ route('admin.organisasi.edit', $organisasi->id) }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                                            <form style="display: inline" method="POST" action="{{ route('admin.organisasi.destroy', $organisasi->id) }}">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" onclick="return confirm('Yakin?')" class="btn btn-danger btn-xs" value="Delete organisasi"><i class="fa fa-trash"></i> Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!--  Konten tab urusan -->
                <div class="tab-pane fade in row {{ isset($_GET['tabName']) ? $_GET['tabName'] == 'urusan' ? 'active' : '' : '' }}" id="tab-urusan">
                    <div class="text-right">
                        <a class="fab update-pro" href="{{ route('admin.urusan.create') }}" title="Tambah data urusan"><i class="fa fa-plus"></i> <span> Tambah Data</span></a>
                    </div>
                    <br>
                    <div class="table-responsive">
                        <table class="table project-table text-center">
                            <thead>
                                <tr>
                                    <th class="text-left">No</th>
                                    <th class="text-left">Kode Urusan</th>
                                    <th class="text-left">Nama Urusan</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data->urusan as $urusan)
                                <tr>
                                    <td class="text-left">{{ $loop->iteration }}</td>
                                    <td class="text-left">{{ $urusan->kode }}</td>
                                    <td class="text-left">{{ $urusan->nama }}</td>
                                    <td>
                                        <a href="{{ route('admin.urusan.show', $urusan->id) }}" class="btn btn-success btn-xs"><i class="fa fa-eye"></i> Lihat</a>
                                        <a href="{{ route('admin.urusan.edit', $urusan->id) }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                                        <form style="display: inline" method="POST" action="{{ route('admin.urusan.destroy', $urusan->id) }}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" onclick="return confirm('Yakin?')" class="btn btn-danger btn-xs" value="Delete urusan"><i class="fa fa-trash"></i> Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!--  Konten tab program -->
                <div class="tab-pane fade in row {{ isset($_GET['tabName']) ? $_GET['tabName'] == 'program' ? 'active' : '' : '' }}" id="tab-program">
                    <div class="text-right">
                        <a class="fab update-pro" href="{{ route('admin.program.create') }}" title="Tambah data program"><i class="fa fa-plus"></i> <span> Tambah Data</span></a>
                    </div>
                    <br>
                    <div class="table-responsive">
                        <table class="table project-table text-center">
                            <thead>
                                <tr>
                                    <th class="text-left">No</th>
                                    <th class="text-left">Kode Program</th>
                                    <th class="text-left">Nama Program</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($programs as $program)
                                @if($program->urusan->periode->status == 1 && $program->organisasi->periode->status == 1)
                                <tr>
                                    <td class="text-left">{{ $loop->iteration }}</td>
                                    <td class="text-left">{{ $program->urusan->kode.".".$program->organisasi->kode.".".$program->kode }}</td>
                                    <td class="text-left">{{ $program->nama }}</td>
                                    <td>
                                        <a href="{{ route('admin.program.show', $program->id) }}" class="btn btn-success btn-xs"><i class="fa fa-eye"> Lihat</i></a>
                                        <a href="{{ route('admin.program.edit', $program->id) }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"> Edit</i></a>
                                        <form style="display: inline" method="POST" action="{{ route('admin.program.destroy', $program->id) }}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" onclick="return confirm('Yakin?')" class="btn btn-danger btn-xs" value="Delete program"><i class="fa fa-trash"></i> Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <!--  Konten tab kegiatan -->
                <div class="tab-pane fade in row {{ isset($_GET['tabName']) ? $_GET['tabName'] == 'kegiatan' ? 'active' : '' : '' }}" id="tab-kegiatan">
                    <div class="text-right">
                        <a class="fab update-pro" href="{{ route('admin.kegiatan.create') }}" title="Tambah Data Kegiatan"><i class="fa fa-plus"></i> <span> Tambah Data</span></a>
                    </div>
                    <br>
                    <div class="table-responsive">
                        <table class="table project-table text-center">
                            <thead>
                                <tr>
                                    <th class="text-left">No</th>
                                    <th class="text-left">Kode Kegiatan</th>
                                    <th class="text-left">Nama Kegiatan</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($kegiatans as $kegiatan)
                                <tr>
                                    <td class="text-left">{{ $loop->iteration }}</td>
                                    <td class="text-left">{{ $kegiatan->program->urusan->kode.".".$kegiatan->program->organisasi->kode.".".$kegiatan->program->kode.".".$kegiatan->kode }}</td>
                                    <td class="text-left">{{ $kegiatan->nama }}</td>
                                    <td>
                                        <a href="{{ route('admin.kegiatan.show', $kegiatan->id) }}" class="btn btn-success btn-xs"><i class="fa fa-eye"></i> Lihat</a>
                                        <a href="{{ route('admin.kegiatan.edit', $kegiatan->id) }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                                        <form style="display: inline" method="POST" action="{{ route('admin.kegiatan.destroy', $kegiatan->id) }}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" onclick="return confirm('Yakin?')" class="btn btn-danger btn-xs" value="Delete kegiatan"><i class="fa fa-trash"></i> Hapus</button>
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