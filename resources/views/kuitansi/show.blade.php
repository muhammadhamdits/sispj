@extends('../../../_templates/layout')

@section('content')
<div class="main">
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Detail Kuitansi</h3>
            <div class="text-right">
                <a class="btn btn-success update-pro" href="{{ route('kuitansi.index') }}" title="Kembali"><i class="fa fa-arrow-left"></i> <span> Kembali</span></a>
            </div>
        </div>
        <div class="panel-body">
            <div class="form-group">
                <label for="kode">Kode : </label>
                <input class="form-control transparent" disabled value="{{ $kuitansi->detailKegiatan->kegiatan->program->urusan->kode.'.'.$kuitansi->detailKegiatan->kegiatan->program->organisasi->kode.'.'.$kuitansi->detailKegiatan->kegiatan->program->kode.'.'.$kuitansi->detailKegiatan->kegiatan->kode}}">
            </div>
            <div class="form-group">
                <label for="nama">Rekening : </label>
                <input class="form-control transparent" disabled value="{{ $kuitansi->detailKegiatan->sub4Uraian->sub3Uraian->sub2Uraian->subUraian->uraian->rekening.'.'.$kuitansi->detailKegiatan->sub4Uraian->sub3Uraian->sub2Uraian->subUraian->rekening.'.'.$kuitansi->detailKegiatan->sub4Uraian->sub3Uraian->sub2Uraian->rekening.'.'.$kuitansi->detailKegiatan->sub4Uraian->sub3Uraian->rekening.'.'.$kuitansi->detailKegiatan->sub4Uraian->rekening }}">
            </div>
            <label>Item : </label>
            <div class="table-responsive">
                <table class="table project-table text-center"  id="tabel-detailItem">
                    <thead>
                        <tr>
                            <th class="text-left">No</th>
                            <th class="text-left">Item</th>
                            <th class="text-left">Volume</th>
                            <th class="text-center">Satuan</th>
                            <th class="text-right">Harga Satuan</th>
                            <th class="text-right">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kuitansi->detailKuitansi as $detail)
                        <tr>
                            <td class="text-left">{{ $loop->iteration }}</td>
                            <td class="text-left">{{ $detail->detailItem->item->nama }}</td>
                            <td class="text-left">{{ $detail->volume }}</td>
                            <td class="tect-center">{{ $detail->detailItem->item->satuan }}</td>
                            <td class="tect-right">{{ $detail->harga_satuan }}</td>
                            <td class="tect-right">{{ $detail->harga_satuan*$detail->volume }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection