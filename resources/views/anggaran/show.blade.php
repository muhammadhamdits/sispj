@extends('../_templates/layout')

@section('content')
<div class="main">
    <!-- OVERVIEW -->
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Detail kegiatan {{ $kegiatan->nama }}</h3>
            <p class="panel-subtitle">Periode: <b>{{ $kegiatan->program->urusan->periode->tahun }} - {{ $kegiatan->program->urusan->periode->jenis == 0 ? 'Sebelum perubahan' : 'Setelah perubahan' }}</b></p>
        </div>
        <div class="panel-body">
            <!-- Modal Urian -->
            <button class="fab btn-success update-pro" data-toggle="modal" data-target="#modalTambahDetailKegiatan" title="Tambah uraian"><i class="fa fa-plus"></i> <span> Tambah Uraian</span></button>
            <div class="modal fade" id="modalTambahDetailKegiatan" tabindex="-1" role="dialog" aria-labelledby="modalTambahDetailKegiatanLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="modalTambahDetailKegiatanLabel">Tambah uraian</h4>
                        </div>
                        <form action="{{ route('anggaran.store') }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="uraian">Uraian : </label>
                                <select id="uraian" class="form-control dynamic" data-dependent="suburaian">
                                    <option value="null" selected>Pilih uraian</option>
                                    @foreach($uraians as $uraian)
                                    <option value="{{ $uraian->id }}">{{ $uraian->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="suburaian">Sub Uraian : </label>
                                <select id="suburaian" class="form-control dynamic" data-dependent="sub2uraian">
                                    <option value="null" selected>Pilih sub uraian</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="sub2uraian">Sub2 Uraian : </label>
                                <select id="sub2uraian" class="form-control dynamic" data-dependent="sub3uraian">
                                    <option value="null" selected>Pilih sub2 uraian</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="sub3uraian">Sub3 Uraian : </label>
                                <select id="sub3uraian" class="form-control dynamic" data-dependent="sub4uraian">
                                    <option value="null" selected>Pilih sub3 uraian</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="sub4uraian">Sub4 Uraian : </label>
                                <select name="sub4_uraian_id" id="sub4uraian" class="form-control">
                                    <option value="null" selected>Pilih sub4 uraian</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="kegiatan_id" value="{{ $kegiatan->id }}">
                            <input type="hidden" name="status" value="{{ $kegiatan->program->urusan->periode->jenis }}">
                            <button type="reset" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal Item -->
            <div class="modal fade" id="modalTambahItem" tabindex="-1" role="dialog" aria-labelledby="modalTambahItemLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="modalTambahItemLabel">Tambah Item</h4>
                        </div>
                        <form action="{{ route('anggaran.item.store') }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="item">Item : </label>
                                <select required id="item" class="form-control" name="item_id">
                                    <option value="null" selected>Pilih item</option>
                                    @foreach($items as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="hargaSatuan">Harga Satuan : </label>
                                <input required type="number" name="harga_satuan" id="hargaSatuan" class="form-control" placeholder="Masukkan harga satuan item">
                            </div>
                            <div class="form-group">
                                <label for="volume">Volume : </label>
                                <input required type="number" name="volume" id="volume" class="form-control" placeholder="Masukkan volume item">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="detail_kegiatan_id" id="detail_kegiatan_id">
                            <button type="reset" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal Kuitansi -->
            <div class="modal fade" id="modalCetakKuitansi" tabindex="-1" role="dialog" aria-labelledby="modalCetakKuitansiLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="modalCetakKuitansiLabel">Cetak kuitansi</h4>
                        </div>
                        <form action="{{ route('kuitansi.print') }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="tanggal">Tanggal : </label>
                                <input required type="date" name="tanggal" id="tanggal" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="terima_dari">Terima Dari : </label>
                                <input required type="text" name="terima_dari" id="terima_dari" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="sebab">Sebab : </label>
                                <input required type="text" name="sebab" id="sebab" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="dibukukan_tanggal">Dibukukan Tanggal : </label>
                                <input required type="date" name="dibukukan_tanggal" id="dibukukan_tanggal" class="form-control">
                            </div>
                            <table style="margin: auto; width: 100%;" id="tabel-items">
                                <tr>
                                    <th></th>
                                    <th>Item</th>
                                    <th>Jumlah</th>
                                    <th>Satuan</th>
                                    <th>Harga</th>
                                </tr>
                                <!-- Item -->
                            </table>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="detail_kegiatan_id" id="detail_kegiatan_id2">
                            <button type="reset" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-print"></i> Cetak</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            @if(session('status'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <i class="fa fa-check-circle"></i> {{ session('status') }}
                </div>
            @elseif(session('warning'))
                <div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <i class="fa fa-pencil"></i> {{ session('warning') }}
                </div>
            @elseif(session('danger'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <i class="fa fa-trash"></i> {{ session('danger') }}
                </div>
            @endif
            <div class="table-responsive">
                <table style="border-collapse: separate; border-spacing: 12px;">
                    <tr>
                        <td>Kode</td>
                        <td>:</td>
                        <td>{{ $kegiatan->program->urusan->kode.'.'.$kegiatan->program->organisasi->kode.'.'.$kegiatan->program->kode.'.'.$kegiatan->kode }}</td>
                    </tr>
                    <tr>
                        <td>Urusan</td>
                        <td>:</td>
                        <td>{{ $kegiatan->program->urusan->nama }}</td>
                    </tr>
                    <tr>
                        <td>Organisasi</td>
                        <td>:</td>
                        <td>{{ $kegiatan->program->organisasi->nama }}</td>
                    </tr>
                    <tr>
                        <td>Program</td>
                        <td>:</td>
                        <td>{{ $kegiatan->program->nama }}</td>
                    </tr>
                    <tr>
                        <td>Uraian</td>
                        <td>:</td>
                        <td></td>
                    </tr>
                </table>
                <table class="table project-table" id="tabel-anggaran">
                    <thead>
                        <tr>
                            <th>Act</th>
                            <th class="text-left">Rekening</th>
                            <th class="text-left">Uraian</th>
                            <th class="text-right">Volume</th>
                            <th class="text-right">Satuan</th>
                            <th class="text-right">Harga Satuan</th>
                            <th class="text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $key => $value)
                            <tr class="1">
                                <td><a class="showhr showhr1" href="#"><i class="fa fa-minus"></i></a></td>
                                <?php
                                $tmp = explode('-',$key);
                                ?>
                                <td>{{ current($tmp) }}</td>
                                <td>{{ end($tmp) }}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            @foreach($value as $key1 => $value1)
                                <tr class="2">
                                    <td><a class="showhr showhr2" href="#"><i class="fa fa-minus"></i></a></td>
                                    <?php
                                    $tmp1 = explode('-',$key1);
                                    ?>
                                    <td>{{ current($tmp1) }}</td>
                                    <td>{{ end($tmp1) }}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                @foreach($value1 as $key2 => $value2)
                                    <tr class="3">
                                        <td><a class="showhr showhr3" href="#"><i class="fa fa-minus"></i></a></td>
                                        <?php
                                        $tmp2 = explode('-',$key2);
                                        ?>
                                        <td>{{ current($tmp2) }}</td>
                                        <td>{{ end($tmp2) }}</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    @foreach($value2 as $key3 => $value3)
                                        <tr class="4">
                                            <td><a class="showhr showhr4" href="#"><i class="fa fa-minus"></i></a></td>
                                            <?php
                                            $tmp3 = explode('-',$key3);
                                            ?>
                                            <td>{{ current($tmp3) }}</td>
                                            <td>{{ end($tmp3) }}</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        @foreach($value3 as $key4 => $value4)
                                            <tr class="5">
                                                <td><a class="showhr showhr5" href="#"><i class="fa fa-minus"></i></a></td>
                                                <?php
                                                $tmp4 = explode('-',$key4);
                                                ?>
                                                <td>{{ current($tmp4) }}</td>
                                                <td>{{ end($tmp4) }}</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td class="text-right">
                                                    <button class="btn btn-success btn-xs addItem" data-toggle="modal" data-target="#modalTambahItem" data-id="{{ $tmp4[1] }}" title="Tambah Item"><i class="fa fa-plus"></i> Tambah</button>
                                                    <button class="btn btn-warning btn-xs cetakKuitansi" data-toggle="modal" data-target="#modalCetakKuitansi" data-id="{{ $tmp4[1] }}" title="Cetak Kuitansi"><i class="fa fa-print"></i> Kuitansi</button>
                                                    <button class="btn btn-danger btn-xs delang" data-id="{{ $tmp4[1] }}"><i class="fa fa-trash"></i> Hapus</button>
                                                    <form action="{{ route('anggaran.destroy', ['id' => $tmp4[1]]) }}" method="post" id="ang-{{ $tmp4[1] }}">
                                                        @csrf
                                                        {{ method_field('DELETE') }}
                                                    </form>
                                                </td>
                                            </tr>
                                            @foreach($value4 as $value5)
                                            @if($value5 != '')
                                                <?php
                                                $tmp5 = explode('-',$value5);
                                                ?>
                                                <tr class="6">
                                                    <td><a class="showhr showhr6 hidden" href="#"><i class="fa fa-minus"></i></a></td>
                                                    <td></td>
                                                    <td>{{ $tmp5[0] }}</td>
                                                    <td class="text-right">{{ $tmp5[1] }}</td>
                                                    <td class="text-right">{{ $tmp5[2] }}</td>
                                                    <td class="text-right">{{ $tmp5[3] }}</td>
                                                    <td class="text-right">
                                                        <button class="btn btn-danger btn-xs delit" data-id="{{ $tmp5[4] }}"><i class="fa fa-trash"></i> Hapus</button>
                                                        <form action="{{ route('anggaran.item.destroy', ['id' => $tmp5[4]]) }}" method="post" id="it-{{ $tmp5[4] }}">
                                                            @csrf
                                                            {{ method_field('DELETE') }}
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endif
                                            @endforeach
                                        @endforeach
                                    @endforeach
                                @endforeach
                            @endforeach
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- END OVERVIEW -->
@endsection