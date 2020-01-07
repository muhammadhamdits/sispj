@extends('../../../_templates/layout')

@section('content')
<div class="main">
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Data Sub2 Uraian {{ $sub2Uraian->nama }}</h3>
            <div class="text-right">
                <a class="btn btn-success update-pro" href="{{ route('admin.uraian.index', ['tabName' => 'sub2uraian']) }}" title="Kembali"><i class="fa fa-arrow-left"></i> <span> Kembali</span></a>
            </div>
        </div>
        <div class="panel-body">

            <div class="form-group">
                <label for="rekening">Rekening : </label>
                <input class="form-control transparent" disabled value="{{ $sub2Uraian->subUraian->uraian->rekening.'.'.$sub2Uraian->subUraian->rekening.'.'.$sub2Uraian->rekening }}">
            </div>
            
            <div class="form-group">
                <label for="nama">Uraian : </label>
                <input class="form-control transparent" disabled value="{{ $sub2Uraian->subUraian->uraian->nama }}">
            </div>
            
            <div class="form-group">
                <label for="nama">Sub Uraian : </label>
                <input class="form-control transparent" disabled value="{{ $sub2Uraian->subUraian->nama }}">
            </div>
            
            <div class="form-group">
                <label for="nama">Sub2 Uraian : </label>
                <input class="form-control transparent" disabled value="{{ $sub2Uraian->nama }}">
            </div>
            
            <label for="nama">Sub3 Uraian : </label>
            <div class="table-responsive">
                <table class="table project-table text-center" id="tabel-sub3uraian">
                    <thead>
                        <tr>
                            <th class="text-left">No</th>
                            <th class="text-left">Rekening</th>
                            <th class="text-left">Nama</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sub2Uraian->sub3Uraian as $sub3_uraian)
                        <tr>
                            <td class="text-left">{{ $loop->iteration }}</td>
                            <td class="text-left">{{ $sub3_uraian->sub2Uraian->subUraian->uraian->rekening.".".$sub3_uraian->sub2Uraian->subUraian->rekening.".".$sub3_uraian->sub2Uraian->rekening.".".$sub3_uraian->rekening }}</td>
                            <td class="text-left">{{ $sub3_uraian->nama }}</td>
                            <td>
                                <a href="{{ route('admin.sub3_uraian.show', $sub3_uraian->id) }}" class="btn btn-success btn-xs"><i class="fa fa-eye"></i> Lihat</a>
                                <a href="{{ route('admin.sub3_uraian.edit', $sub3_uraian->id) }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                                <form style="display: inline" method="POST" id="data-{{ '3'.$sub3_uraian->id }}" action="{{ route('admin.sub3_uraian.destroy', $sub3_uraian->id) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                </form>
                                <button type="submit" onclick="remove({{ '4'.$sub3_uraian->id }})" class="btn btn-danger btn-xs" value="Delete user"><i class="fa fa-trash"></i> Hapus</button>
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