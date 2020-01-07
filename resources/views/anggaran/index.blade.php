@extends('../_templates/layout')

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
                <!-- Konten tab organisasi -->
                <div class="tab-pane fade in row {{ isset($_GET['tabName']) ? '' : 'active' }}" id="tab-organisasi">
                    <div class="text-right">
                        <a class="fab update-pro btn-success" href="{{ route('admin.organisasi.create') }}" title="Tambah data organisasi"><i class="fa fa-plus"> </i> <span> Tambah Data</span></a>
                    </div>
                    <div class="table-responsive">
                        <table class="table project-table text-center" id="tabel-organisasi">
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
                                            <form style="display: inline" method="POST" id="data-{{ '1'.$organisasi->id }}" action="{{ route('admin.organisasi.destroy', $organisasi->id) }}">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                            </form>
                                            <button class="btn btn-danger btn-xs" onclick="remove({{ '1'.$organisasi->id }})"><i class="fa fa-trash"></i> Hapus</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Akhir konten masing-masing tab -->
            <!-- END TABBED CONTENT -->
        </div>
    </div>
</div>
<!-- END OVERVIEW -->
@endsection