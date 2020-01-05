@extends('../../../_templates/layout')

@section('content')
<div class="main">
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Data {{ $program->nama }}</h3>
            <p class="panel-subtitle">Periode: <b>{{ $program->urusan->periode->tahun }} - {{ $program->urusan->periode->jenis == 0 ? 'Sebelum perubahan' : 'Setelah perubahan' }}</b></p>
            <div class="text-right">
                <a class="btn btn-success update-pro" href="{{ route('admin.utama.index', ['tabName' => 'program']) }}" title="Kembali"><i class="fa fa-arrow-left"></i> <span> Kembali</span></a>
            </div>
        </div>
        <div class="panel-body">
            <div class="form-group">
                <label for="urusan">Urusan: </label>
                <input class="form-control transparent" disabled value="{{ $program->urusan->nama }}">
            </div>
            <div class="form-group">
                <label for="organisasi">Organisasi: </label>
                <input class="form-control transparent" disabled value="{{ $program->organisasi->nama }}">
            </div>
            <div class="form-group">
                <label for="kode">Kode Program: </label>
                <input class="form-control transparent" disabled value="{{ $program->urusan->kode.'.'.$program->organisasi->kode.'.'.$program->kode }}">
            </div>
            <div class="form-group">
                <label for="nama">Nama Program : </label>
                <input class="form-control transparent" disabled value="{{ $program->nama }}">
            </div>
            <label for="nama">Kegiatan : </label>
            <div class="table-responsive">
                <table class="table project-table text-center"  id="tabel-kegiatan">
                    <thead>
                        <tr>
                            <th class="text-left">No</th>
                            <th class="text-left">Kode Kegiatan</th>
                            <th class="text-left">Nama Kegiatan</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($program->kegiatan as $kegiatan)
                        <tr>
                            <td class="text-left">{{ $loop->iteration }}</td>
                            <td class="text-left">{{ $kegiatan->program->urusan->kode.".".$kegiatan->program->organisasi->kode.".".$kegiatan->program->kode.".".$kegiatan->kode }}</td>
                            <td class="text-left">{{ $kegiatan->nama }}</td>
                            <td>
                                <a href="{{ route('admin.kegiatan.show', $kegiatan->id) }}" class="btn btn-success btn-xs"><i class="fa fa-eye"></i> Lihat</a>
                                <a href="{{ route('admin.kegiatan.edit', $kegiatan->id) }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                                <form style="display: inline" method="POST" id="data-{{ '4'.$kegiatan->id }}" action="{{ route('admin.kegiatan.destroy', $kegiatan->id) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                </form>
                                <button onclick="remove({{ '4'.$kegiatan->id }})" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection