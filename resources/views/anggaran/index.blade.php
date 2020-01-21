@extends('../_templates/layout')

@section('content')
<div class="main">
    <!-- OVERVIEW -->
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Daftar kegiatan</h3>
            @if($data != null)
                <p class="panel-subtitle">Periode: <b>{{ $data->tahun }} - {{ $data->jenis == 0 ? 'Sebelum perubahan' : 'Setelah perubahan' }}</b></p>
            @endif
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table project-table" id="tabel-anggaran">
                    <thead>
                        <tr>
                            <th class="text-left">No</th>
                            <th class="text-left">Kode</th>
                            <th class="text-left">Nama Kegiatan</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kegiatans as $kegiatan)
                        @if($kegiatan->program->urusan->periode->status == 1)
                            <tr>
                                <td class="text-left">{{ $loop->iteration }}</td>
                                <td class="text-left">{{ $kegiatan->program->urusan->kode.'.'.$kegiatan->program->organisasi->kode.'.'.$kegiatan->program->kode.'.'.$kegiatan->kode }}</td>
                                <td class="text-left">{{ $kegiatan->nama }}</td>
                                <td class="text-center">
                                    <a href="{{ route('anggaran.rekap', $kegiatan->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-file"></i> Rekap</a>
                                    <a href="{{ route('anggaran.show', $kegiatan->id) }}" class="btn btn-success btn-xs"><i class="fa fa-eye"></i> Detail</a>
                                </td>
                            </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- END OVERVIEW -->
@endsection