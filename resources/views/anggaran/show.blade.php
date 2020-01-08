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
            <!-- Modal -->
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
                            <th class="text-left">Rekening</th>
                            <th class="text-left">Uraian</th>
                            <th class="text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $key => $value)
                            <tr>
                                <?php
                                $tmp = explode('-',$key);
                                ?>
                                <td>{{ current($tmp) }}</td>
                                <td>{{ end($tmp) }}</td>
                                <td></td>
                            </tr>
                            @foreach($value as $key1 => $value1)
                                <tr>
                                    <?php
                                    $tmp1 = explode('-',$key1);
                                    ?>
                                    <td>{{ current($tmp1) }}</td>
                                    <td>{{ end($tmp1) }}</td>
                                    <td></td>
                                </tr>
                                @foreach($value1 as $key2 => $value2)
                                    <tr>
                                        <?php
                                        $tmp2 = explode('-',$key2);
                                        ?>
                                        <td>{{ current($tmp2) }}</td>
                                        <td>{{ end($tmp2) }}</td>
                                        <td></td>
                                    </tr>
                                    @foreach($value2 as $key3 => $value3)
                                        <tr>
                                            <?php
                                            $tmp3 = explode('-',$key3);
                                            ?>
                                            <td>{{ current($tmp3) }}</td>
                                            <td>{{ end($tmp3) }}</td>
                                            <td></td>
                                        </tr>
                                        @foreach($value3 as $key4 => $value4)
                                            <tr>
                                                <?php
                                                $tmp4 = explode('-',$key4);
                                                ?>
                                                <td>{{ current($tmp4) }}</td>
                                                <td>{{ end($tmp4) }}</td>
                                                <td class="text-right">
                                                    <a href="" class="btn btn-success btn-xs"><i class="fa fa-eye"></i> Detail</a>
                                                    <a href="" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>
                                                </td>
                                            </tr>
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