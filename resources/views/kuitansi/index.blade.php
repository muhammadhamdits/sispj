@extends('../_templates/layout')

@section('content')
<div class="main">
    <!-- OVERVIEW -->
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Daftar Kuitansi</h3>
            @if($data != null)
                <p class="panel-subtitle">Periode: <b>{{ $data->tahun }} - {{ $data->jenis == 0 ? 'Sebelum perubahan' : 'Setelah perubahan' }}</b></p>
            @endif
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table project-table" id="tabel-kuitansi">
                    <thead>
                        <tr>
                            <th class="text-left">No</th>
                            <th class="text-left">Tanggal</th>
                            <th class="text-left">Terima Dari</th>
                            <th class="text-left">Kegiatan</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kuitansis as $kuitansi)
                        @if($kuitansi->detailKegiatan->kegiatan->program->organisasi->id == Auth::user()->organisasi_id)
                            <tr>
                                <td class="text-left">{{ $loop->iteration }}</td>
                                <td class="text-left">{{ $kuitansi->tanggal }}</td>
                                <td class="text-left">{{ $kuitansi->terima_dari }}</td>
                                <td class="text-left">{{ $kuitansi->detailKegiatan->kegiatan->nama }}</td>
                                <td class="text-center">
                                    <a href="{{ route('kuitansi.cetak', $kuitansi) }}" target="_blank" class="btn btn-info btn-xs"><i class="fa fa-print"></i> Print</a>
                                    <a href="{{ route('kuitansi.show', $kuitansi) }}" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> Detail</a>
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