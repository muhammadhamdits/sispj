@extends('../_templates/layout')

@section('content')
<style>
    .border{
        border: 1px solid black;
        padding-left: 2%;
        padding-right: 2%;
        padding-top: 1%;
        padding-bottom: 1%
    }
    .tabel-border, .tabel-border td{
        border: 1px solid black; 
        border-collapse: collapse;
        font-size: 12px;
        padding: 4px
    }
    tfoot td{
        border: none !important;
    }
</style>
<div class="main">
    <!-- OVERVIEW -->
    <div class="panel panel-headline">
        <div class="panel-heading">
            <h3 class="panel-title">Rekap</h3>
            <a class="fab btn-success update-pro" title="Cetak"><i class="fa fa-print"></i> <span> Cetak</span></a>
        </div>
        <div class="panel-body">
            <div class="border">
                <table width="100%">
                    <tr>
                        <td width="20%">Urusan Pemerintahan</td>
                        <td>:</td>
                        <td>1.02.10 - Komunikasi dan Informatika</td>
                    </tr>
                    <tr>
                        <td>Organisasi</td>
                        <td>:</td>
                        <td>1.02.10.01 - Dinas Komunikasi dan Informatika</td>
                    </tr>
                </table>
            </div>
            <div class="border">

                <table width="100%">
                    <tr>
                        <td>Program</td>
                        <td>:</td>
                        <td>1.02.10.15 - Program Pengembangan Komunikasi, Informasi, dan Media Massa</td>
                    </tr>
                    <tr>
                        <td>Kegiatan</td>
                        <td>:</td>
                        <td>1.02.10.15.37 - Penyediaan Jasa Pelayanan Informasi Publik</td>
                    </tr>
                    <tr>
                        <td>Lokasi Kegiatan</td>
                        <td>:</td>
                        <td>Kota Padang</td>
                    </tr>
                </table>

                <h5 class="text-center"><b>Perubahan Indikator & Tolok Ukur Kinerja Belanja Langsung</b></h5>
                <table class="text-center tabel-border" width="100%">
                    <tr>
                        <td rowspan="2">Indikator</td>
                        <td colspan="2">Tolok Ukur Kinerja</td>
                        <td colspan="2">Target Kinerja</td>
                    </tr>
                    <tr>    
                        <td>Sebelum Perubahan</td>
                        <td>Setelah Perubahan</td>
                        <td>Sebelum Perubahan</td>
                        <td>Setelah Perubahan</td>
                    </tr>
                    <tr class="text-left">
                        <td>Capaian Program</td>
                        <td>Tercapainya capaian kinerja pelayanan informasi publik</td>
                        <td>Tercapainya capaian kinerja pelayanan informasi publik</td>
                        <td>2 Aplikasi</td>
                        <td>2 Aplikasi</td>
                    </tr>
                    <tr class="text-left">
                        <td>Masukan</td>
                        <td>Jumlah Dana</td>
                        <td>Jumlah Dana</td>
                        <td class="text-right">Rp 220.061.200,00</td>
                        <td class="text-right">Rp 220.061.200,00</td>
                    </tr>
                    <tr class="text-left">
                        <td>Keluaran</td>
                        <td>Tersedianya pelayanan informasi kepada publik</td>
                        <td>Tersedianya pelayanan informasi kepada publik</td>
                        <td>2 Aplikasi</td>
                        <td>2 Aplikasi</td>
                    </tr>
                    <tr class="text-left">
                        <td>Hasil</td>
                        <td>Peningkatan kualitas pelayanan pemerintah kepada masyarakat</td>
                        <td>Peningkatan kualitas pelayanan pemerintah kepada masyarakat</td>
                        <td>80%</td>
                        <td>80%</td>
                    </tr>
                    <tr class="text-left">
                        <td colspan="5">Kelompok Sasaran Kegiatan</td>
                    </tr>
                </table>

                <h5 class="text-center"><b>Rincian Perubahan Anggaran Belanja Langsung Program dan Per Kegiatan Satuan Kerja Perangkat Daerah</b></h5>

            </div>

            <div style="border: 1px solid black; padding:0;">

                <table class="tabel-border text-center" width="100%">
                    <tr>
                        <td rowspan="3">Kode Rekening</td>
                        <td rowspan="3">Uraian</td>
                        <td colspan="4">Sebelum Perubahan</td>
                        <td colspan="4">Setelah Perubahan</td>
                        <td colspan="2">Bertambah/Berkurang</td>
                    </tr>

                    <tr>
                        <td colspan="3">Rincian Perhitungan</td>
                        <td rowspan="2">Jumlah (Rp)</td>
                        <td colspan="3">Rincian Perhitungan</td>
                        <td rowspan="2">Jumlah (Rp)</td>
                        <td rowspan="2">Rp</td>
                        <td rowspan="2">%</td>
                    </tr>

                    <tr>
                        <td>Volume</td>
                        <td>Satuan</td>
                        <td>Harga Satuan</td>
                        <td>Volume</td>
                        <td>Satuan</td>
                        <td>Harga Satuan</td>
                    </tr>

                    <tr>
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                        <td>5</td>
                        <td>6 = ( 3 x 5 )</td>
                        <td>7</td>
                        <td>8</td>
                        <td>9</td>
                        <td>10</td>
                        <td>11</td>
                        <td>12</td>
                    </tr>

                    <tr>
                        <td>5.2</td>
                        <td>BELANJA LANGSUNG</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>226.061.200,00</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>96.521.200,00</td>
                        <td>(129.240.000,00)</td>
                        <td>(57)</td>
                    </tr>

                    <tr>
                        <td colspan="5">Jumlah</td>
                        <td>226.061.200,00</td>
                        <td colspan="3"></td>
                        <td>96.821.200,00</td>
                        <td>(129.240.000,00)</td>
                        <td>(57)</td>
                    </tr>

                    <tfoot>
                        <tr>
                            <td colspan="9"></td>
                            <td colspan="2">Padang</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="9"></td>
                            <td colspan="2"><b>Pengguna Anggaran</b></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="9"></td>
                            <td colspan="2" style="height: 50px"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="9"></td>
                            <td colspan="2"><b><u>Suardi</u></b></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="9"></td>
                            <td colspan="2">NIP</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="12" class="text-left" style="padding-left: 10px">Keterangan </td>
                        </tr>
                        <tr>
                            <td colspan="12" class="text-left" style="padding-left: 10px">Tanggal Pembahasan</td>
                        </tr>
                        <tr>
                            <td colspan="12" class="text-left" style="padding-left: 10px">Catatan Hasil Pembahasan</td>
                        </tr>

                        <tr>
                            <td colspan="12" style="height:30px"></td>
                        </tr>
                    </tfoot>
                </table>

            </div>
        </div>
    </div>
</div>
<!-- END OVERVIEW -->
@endsection