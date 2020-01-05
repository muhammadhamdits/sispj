@extends('../../../_templates/layout')

@section('content')
<div class="main">
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Data {{ $urusan->nama }}</h3>
            <p class="panel-subtitle">Periode: <b>{{ $urusan->periode->tahun }} - {{ $urusan->periode->jenis == 0 ? 'Sebelum perubahan' : 'Setelah perubahan' }}</b></p>
            <div class="text-right">
                <a class="btn btn-success update-pro" href="{{ route('admin.utama.index', ['tabName' => 'urusan']) }}" title="Kembali"><i class="fa fa-arrow-left"></i> <span> Kembali</span></a>
            </div>
        </div>
        <div class="panel-body">
            <div class="form-group">
                <label for="kode">Kode Urusan: </label>
                <input class="form-control transparent" disabled value="{{ $urusan->kode}}">
            </div>
            <div class="form-group">
                <label for="nama">Nama Urusan : </label>
                <input class="form-control transparent" disabled value="{{ $urusan->nama }}">
            </div>
            <label>Program : </label>
            <div class="table-responsive">
                <table class="table project-table text-center"  id="tabel-program">
                    <thead>
                        <tr>
                            <th class="text-left">No</th>
                            <th class="text-left">Kode Program</th>
                            <th class="text-left">Nama Program</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($urusan->program as $program)
                        @if($program->urusan->periode->status == 1 && $program->organisasi->periode->status == 1)
                        <tr>
                            <td class="text-left">{{ $loop->iteration }}</td>
                            <td class="text-left">{{ $program->urusan->kode.".".$program->organisasi->kode.".".$program->kode }}</td>
                            <td class="text-left">{{ $program->nama }}</td>
                            <td>
                                <a href="{{ route('admin.program.show', $program->id) }}" class="btn btn-success btn-xs"><i class="fa fa-eye"> Lihat</i></a>
                                <a href="{{ route('admin.program.edit', $program->id) }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"> Edit</i></a>
                                <form style="display: inline" method="POST" id="data-{{ '3'.$program->id }}" action="{{ route('admin.program.destroy', $program->id) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                </form>
                                <button onclick="remove({{ '3'.$program->id }})" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</button>
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
@endsection