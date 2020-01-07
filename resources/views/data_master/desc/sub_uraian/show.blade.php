@extends('../../../_templates/layout')

@section('content')
<div class="main">
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Data {{ $sub_uraian->nama }}</h3>
            <div class="text-right">
                <a class="btn btn-success update-pro" href="{{ route('admin.uraian.index', ['tabName' => 'suburaian']) }}" title="Kembali"><i class="fa fa-arrow-left"></i> <span> Kembali</span></a>
            </div>
        </div>
        <div class="panel-body">
            <div class="form-group">
                <label for="kode">Rekening: </label>
                <input class="form-control transparent" disabled value="{{ $sub_uraian->uraian->rekening.'.'.$sub_uraian->rekening }}">
            </div>
            <div class="form-group">
                <label for="uraian">Uraian: </label>
                <input class="form-control transparent" disabled value="{{ $sub_uraian->uraian->nama }}">
            </div>
            <div class="form-group">
                <label for="nama">Sub Uraian : </label>
                <input class="form-control transparent" disabled value="{{ $sub_uraian->nama }}">
            </div>
            <label for="">Sub2 Uraian : </label>
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
                        @foreach($sub_uraian->sub2Uraian as $sub2_uraian)
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
    </div>
</div>
@endsection