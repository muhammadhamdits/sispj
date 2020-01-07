@extends('../../../_templates/layout')

@section('content')
<div class="main">
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Data {{ $uraian->nama }}</h3>
            <div class="text-right">
                <a class="btn btn-success update-pro" href="{{ route('admin.uraian.index') }}" title="Kembali"><i class="fa fa-arrow-left"></i> <span> Kembali</span></a>
            </div>
        </div>
        <div class="panel-body">
            <div class="form-group">
                <label for="kode">Rekening : </label>
                <input class="form-control transparent" disabled value="{{ $uraian->rekening}}">
            </div>
            <div class="form-group">
                <label for="nama">Nama uraian : </label>
                <input class="form-control transparent" disabled value="{{ $uraian->nama }}">
            </div>
            <label for="tabel">Sub Uraian : </label>
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
                        @foreach($uraian->subUraian as $sub_uraian)
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
    </div>
</div>
@endsection