@extends('../../_templates/layout')

@section('content')
<div class="main">
    <!-- OVERVIEW -->
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Kelola data organisasi</h3>
            <p class="panel-subtitle">Periode: <b>{{ $periode->tahun }} - {{ $periode->jenis == 0 ? 'Sebelum perubahan' : 'Setelah perubahan' }}</b></p>
            <?php $tabName = $_GET['tabName'] ?>
        </div>
        <div class="panel-body">
            <!-- TABBED CONTENT -->
            <div class="custom-tabs-line tabs-line-bottom left-aligned">
                <ul class="nav" role="tablist">
                    <li class="{{ empty($tabName) || $tabName == 'organisasi' ? 'active' : '' }}"><a href="#tab-organisasi" role="tab" data-toggle="tab">Organisasi</a></li>
                    <li class="{{ $tabName == 'urusan' ? 'active' : '' }}"><a href="#tab-urusan" role="tab" data-toggle="tab">Urusan</a></li>
                    <li class=""><a href="#tab-program" role="tab" data-toggle="tab">Program</a></li>
                    <li class=""><a href="#tab-kegiatan" role="tab" data-toggle="tab">Kegiatan</a></li>
                    <li class=""><a href="#tab-periode" role="tab" data-toggle="tab">Periode</a></li>
                </ul>
            </div>
            <div class="tab-content">
                <!-- Konten tab organisasi -->
                <div class="tab-pane fade in row {{ empty($tabName) || $tabName == 'organisasi' ? 'active' : '' }}" id="tab-organisasi">
                    <div class="text-right">
                        <a class="btn btn-success update-pro" href="{{ route('admin.organisasi.create') }}" title="Tambah data organisasi"><i class="fa fa-plus"></i> <span> Add Data</span></a>
                    </div>
                    <br>
                    <div class="table-responsive">
                        <table class="table project-table text-center">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Kode</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($organisasis as $organisasi)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $organisasi->kode }}</td>
                                    <td>{{ $organisasi->nama }}</td>
                                    <td>
                                        <a href="{{ route('admin.organisasi.show', $organisasi->id) }}" class="btn btn-success btn-xs"><i class="fa fa-eye"></i> View</a>
                                        <a href="{{ route('admin.organisasi.edit', $organisasi->id) }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                                        <form style="display: inline" method="POST" action="{{ route('admin.organisasi.destroy', $organisasi->id) }}">
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
                <!-- Konten tab urusan -->
                <div class="tab-pane fade in row {{ $tabName == 'urusan' ? 'active' : '' }}" id="tab-urusan">
                    <div class="text-right">
                        <a class="btn btn-success update-pro" href="{{ route('admin.urusan.create') }}" title="Tambah data urusan"><i class="fa fa-plus"></i> <span> Add Data</span></a>
                    </div>
                    <br>
                    <div class="table-responsive">
                        <table class="table project-table text-center">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Kode</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($urusans as $urusan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $urusan->kode }}</td>
                                    <td>{{ $urusan->nama }}</td>
                                    <td>
                                        <a href="{{ route('admin.urusan.show', $urusan->id) }}" class="btn btn-success btn-xs"><i class="fa fa-eye"></i> View</a>
                                        <a href="{{ route('admin.urusan.edit', $urusan->id) }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                                        <form style="display: inline" method="POST" action="{{ route('admin.urusan.destroy', $urusan->id) }}">
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