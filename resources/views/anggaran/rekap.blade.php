@extends('../_templates/layout')

@section('content')
<style>
    .border{
        border: 1px solid black;
        padding-left: 2%;
        padding-top: 1%;
        padding-bottom: 1%
    }
    .tabel-border, .tabel-border td{
        border: 1px solid black; 
        border-collapse: collapse;
        font-size: 12px;
        padding: 4px
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
                        <td>Urusan Pemerintahan</td>
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

            <div class="border">

                <table class="tabel-border" width="100%">
                    
                </table>

            </div>
        </div>
    </div>
</div>
<!-- END OVERVIEW -->
@endsection