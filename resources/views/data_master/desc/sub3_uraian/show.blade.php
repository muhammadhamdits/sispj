@extends('../../../_templates/layout')

@section('content')
<div class="main">
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Data {{ $sub3_uraian->nama }}</h3>
            <div class="text-right">
                <a class="btn btn-success update-pro" href="{{ route('admin.uraian.index', ['tabName' => 'sub3uraian']) }}" title="Kembali"><i class="fa fa-arrow-left"></i> <span> Kembali</span></a>
            </div>
        </div>
        <div class="panel-body">
            <div class="form-group">
                <label for="rekening">Rekening: </label>
                <input class="form-control transparent" disabled value="{{ $sub3_uraian->sub2Uraian->subUraian->uraian->rekening.'.'.$sub3_uraian->sub2Uraian->subUraian->rekening.'.'.$sub3_uraian->sub2Uraian->rekening.'.'.$sub3_uraian->rekening }}">
            </div>
            <div class="form-group">
                <label for="uraian">Uraian: </label>
                <input class="form-control transparent" disabled value="{{ $sub3_uraian->sub2Uraian->subUraian->uraian->nama }}">
            </div>
            <div class="form-group">
                <label for="uraian">Sub Uraian: </label>
                <input class="form-control transparent" disabled value="{{ $sub3_uraian->sub2Uraian->subUraian->nama }}">
            </div>
            <div class="form-group">
                <label for="uraian">Sub2 Uraian: </label>
                <input class="form-control transparent" disabled value="{{ $sub3_uraian->sub2Uraian->nama }}">
            </div>
            <div class="form-group">
                <label for="nama">Sub3 Uraian : </label>
                <input class="form-control transparent" disabled value="{{ $sub3_uraian->nama }}">
            </div>
            <label for="">Sub4 Uraian : </label>
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
                        @foreach($sub3_uraian->sub4Uraian as $sub4uraian)
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
                                        <button type="submit" onclick="remove({{ '5'.$sub4uraian->id }})" class="btn btn-danger btn-xs" value="Delete user"><i class="fa fa-trash"></i> Hapus</button>
                                    </form>
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