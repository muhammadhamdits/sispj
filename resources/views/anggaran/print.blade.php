<!doctype html>
<html lang="en">

<head>
	<title>Dashboard | Klorofil - Free Bootstrap Dashboard Template</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="{{ url('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ url('assets/vendor/font-awesome/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ url('assets/vendor/linearicons/style.css') }}">
	<link rel="stylesheet" href="{{ url('assets/vendor/chartist/css/chartist-custom.css') }}">
	<link rel="stylesheet" href="{{ url('assets/vendor/toastr/toastr.min.css') }}">
	<link rel="stylesheet" href="{{ url('assets/vendor/datatables/datatables.min.css') }}">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{ url('assets/css/main.css') }}">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<!-- <link rel="stylesheet" href="{{ url('assets/css/demo.css') }}"> -->
	<!-- GOOGLE FONTS -->
	<link href="{{ url('assets/font/source_sans_pro.css') }}" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="{{ url('assets/img/apple-icon.png') }}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{ url('assets/img/favicon.png') }}">
    <style>
        .border{
            border: 1px solid black;
            padding-left: 2%;
            padding-right: 2%;
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
        body{
            background: none;
        }
        .tbody td{
            border-bottom: none !important;
            border-top: none !important;
            padding-left: 1%
        }
    </style>
</head>

<body>
    <div style="border: 1px solid black; padding:0;">
        <table width="100%" class="text-center" border="1">
            <tr>
                <td rowspan="4" width="10%" style="border: 1px solid black !important"><img width="75" src="{{ url('/assets/img/logo-kota-padang.png') }}" alt=""></td>
                <td>Satuan Kerja Perangkat Daerah <br> Rencana Kerja Perubahan Anggaran </td>
                <td rowspan="4" width="10%" style="border: 1px solid black !important">RKA - SKPD 2.3.1 PERUBAHAN</td>
            </tr>
            <tr>
                <td>Pemerintah Kota Padang <br> Tahun Anggaran {{ $kegiatan->program->urusan->periode->tahun }}</td>
            </tr>
        </table>
    </div>

    <div class="border">
        <table width="100%">
            <tr>
                <td width="20%">Urusan Pemerintahan</td>
                <td>:</td>
                <td>{{ $kegiatan->program->urusan->kode }} - {{ $kegiatan->program->urusan->nama }}</td>
            </tr>
            <tr>
                <td>Organisasi</td>
                <td>:</td>
                <td>{{ $kegiatan->program->organisasi->kode }} - {{ $kegiatan->program->organisasi->nama }}</td>
            </tr>
        </table>
    </div>

    <div class="border">

        <table width="100%">
            <tr>
                <td width="20%">Program</td>
                <td>:</td>
                <td>{{ $kegiatan->program->urusan->kode.".".$kegiatan->program->organisasi->kode.".".$kegiatan->program->kode }} - {{ $kegiatan->program->nama }}</td>
            </tr>
            <tr>
                <td>Kegiatan</td>
                <td>:</td>
                <td>{{ $kegiatan->program->urusan->kode.".".$kegiatan->program->organisasi->kode.".".$kegiatan->program->kode.".".$kegiatan->kode }} - {{ $kegiatan->nama }}</td>
            </tr>
            <tr>
                <td>Lokasi Kegiatan</td>
                <td>:</td>
                <td>Kota Padang</td>
            </tr>
        </table>

        <br>
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
        <br>
        <h5 class="text-center"><b>Rincian Perubahan Anggaran Belanja Langsung Program dan Per Kegiatan Satuan Kerja Perangkat Daerah</b></h5>

    </div>

    <div style="border: 1px solid black; padding:0;">

        <table class="tabel-border text-center" width="100%">
            <thead>
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
            </thead>

            <tbody class="tbody">
                <?php
                    $sum0 = 0;
                    $sum1 = 0;
                ?>
                @foreach($data as $key => $value)
                <?php
                    $tmp = explode('-',$key);
                    $total0 = 0;
                    $total1 = 0;
                ?>
                <tr id="{{ $tmp[0] }}">
                    <td class="text-left">{{ current($tmp) }}</td>
                    <td class="text-left" style="padding-left: 0.5%">{{ end($tmp) }}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="text-right"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="text-right">96.521.200,00</td>
                    <td class="text-right">(129.240.000,00)</td>
                    <td>(57)</td>
                </tr>
                    @foreach($value as $key1 => $value1)
                    <?php
                        $tmp1 = explode('-',$key1);
                        $total10 = 0;
                        $total11 = 0;
                    ?>
                    <tr id="{{ $tmp1[0] }}">
                        <td class="text-left">{{ current($tmp1) }}</td>
                        <td class="text-left" style="padding-left: 0.5%">{{ end($tmp1) }}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="text-right"></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="text-right">96.521.200,00</td>
                        <td class="text-right">(129.240.000,00)</td>
                        <td>(57)</td>
                    </tr>
                        @foreach($value1 as $key2 => $value2)
                        <?php
                            $tmp2 = explode('-',$key2);
                            $total20 = 0;
                            $total21 = 0;
                        ?>
                        <tr id="{{ $tmp2[0] }}">
                            <td class="text-left">{{ current($tmp2) }}</td>
                            <td class="text-left" style="padding-left: 0.5%">{{ end($tmp2) }}</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="text-right"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="text-right">96.521.200,00</td>
                            <td class="text-right">(129.240.000,00)</td>
                            <td>(57)</td>
                        </tr>
                            @foreach($value2 as $key3 => $value3)
                            <?php
                                $tmp3 = explode('-',$key3);
                                $total30 = 0;
                                $total31 = 0;
                            ?>
                            <tr id="{{ $tmp3[0] }}">
                                <td class="text-left">{{ current($tmp3) }}</td>
                                <td class="text-left" style="padding-left: 0.5%">{{ end($tmp3) }}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="text-right"></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="text-right">96.521.200,00</td>
                                <td class="text-right">(129.240.000,00)</td>
                                <td>(57)</td>
                            </tr>
                                @foreach($value3 as $key4 => $value4)
                                <?php
                                    $tmp4 = explode('-',$key4);
                                    $total30 += end($value4[0]);
                                    $total20 += end($value4[0]);
                                    $total10 += end($value4[0]);
                                    $total0 += end($value4[0]);
                                    $sum0 += end($value4[0]);
                                    $total31 += end($value4[1]);
                                    $total21 += end($value4[1]);
                                    $total11 += end($value4[1]);
                                    $total1 += end($value4[1]);
                                    $sum1 += end($value4[1]);
                                ?>
                                <tr>
                                    <td class="text-left">{{ current($tmp4) }}</td>
                                    <td class="text-left" style="padding-left: 0.5%">{{ end($tmp4) }}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-right">{{ number_format(end($value4[0]), '2', ',', '.') }}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-right">{{ number_format(end($value4[1]), '2', ',', '.') }}</td>
                                    <td class="text-right">{{ number_format(end($value4[0])-end($value4[1]), '2', ',', '.') }}</td>
                                    <td>
                                    @if(end($value4[0]) != 0)
                                    {{ ((end($value4[0])-end($value4[1]))/end($value4[0]))*100 }}
                                    @else
                                    {{ '-' }}
                                    @endif
                                    </td>
                                </tr>
                                    <?php
                                        $indeks = 0;
                                    ?>
                                    @foreach($value4[0] as $key5 => $value5)
                                    <?php
                                        // dd($value5);
                                    ?>
                                    @if($key5 != count($value4[0])-1)
                                        <?php
                                        $tmp5 = explode('-',$value5);
                                        $tmp6 = explode('-',$value4[1][$indeks]);
                                        $jumlah0 = $tmp5[1]*$tmp5[3];
                                        $jumlah1 = $tmp6[1]*$tmp6[3];
                                        $selisih = $jumlah0-$jumlah1;
                                        if($jumlah0 != 0){
                                            $persen = ($selisih/$jumlah0)*100;
                                        } else{
                                            $persen = '-';
                                        }
                                        ?>
                                        <tr class="6">
                                            <td></td>
                                            <td class="text-left" style="padding-left: 1.25%">{{ $tmp5[0] }}</td>
                                            <td class="text-right">{{ $tmp5[1] }}</td>
                                            <td class="text-right">{{ $tmp5[2] }}</td>
                                            <td class="text-right">{{ $tmp5[3] }}</td>
                                            <td class="text-right">{{ number_format($jumlah0, '2', ',', '.') }}</td>
                                            <td class="text-right">{{ $tmp6[1] }}</td>
                                            <td class="text-right">{{ $tmp6[2] }}</td>
                                            <td class="text-right">{{ $tmp6[3] }}</td>
                                            <td class="text-right">{{ number_format($jumlah1, '2', ',', '.') }}</td>
                                            <td class="text-right">{{ number_format($selisih, '2', ',', '.') }}</td>
                                            <td>{{ $persen }}</td>
                                        </tr>
                                        <?php
                                            $indeks += 1;
                                        ?>
                                    @endif
                                    @endforeach
                                @endforeach
                                <script>
                                    var tmp3 = document.getElementById('{{ $tmp3[0] }}').children;
                                    tmp3.item(5).innerHTML = "{{ number_format($total30, '2', ',', '.') }}";
                                    tmp3.item(9).innerHTML = "{{ number_format($total31, '2', ',', '.') }}";
                                    tmp3.item(10).innerHTML = "{{ number_format($total30-$total31, '2', ',', '.') }}";
                                    @if($total30 != 0)
                                    tmp3.item(11).innerHTML = "{{ (($total30-$total31)/$total30)*100 }}";
                                    @endif
                                </script>
                                <?php

                                ?>
                            @endforeach
                            <script>
                                var tmp2 = document.getElementById('{{ $tmp2[0] }}').children;
                                tmp2.item(5).innerHTML = "{{ number_format($total20, '2', ',', '.') }}";
                                tmp2.item(9).innerHTML = "{{ number_format($total21, '2', ',', '.') }}";
                                tmp2.item(10).innerHTML = "{{ number_format($total20-$total21, '2', ',', '.') }}";
                                @if($total20 != 0)
                                tmp2.item(11).innerHTML = "{{ (($total20-$total21)/$total20)*100 }}";
                                @endif
                            </script>
                        @endforeach
                        <script>
                            var tmp1 = document.getElementById('{{ $tmp1[0] }}').children;
                            tmp1.item(5).innerHTML = "{{ number_format($total10, '2', ',', '.') }}";
                            tmp1.item(9).innerHTML = "{{ number_format($total11, '2', ',', '.') }}";
                            tmp1.item(10).innerHTML = "{{ number_format($total10-$total11, '2', ',', '.') }}";
                            @if($total10 != 0)
                            tmp1.item(11).innerHTML = "{{ (($total10-$total11)/$total10)*100 }}";
                            @endif
                        </script>
                    @endforeach
                    <script>
                        var tmp = document.getElementById('{{ $tmp[0] }}').children;
                        tmp.item(5).innerHTML = "{{ number_format($total0, '2', ',', '.') }}";
                        tmp.item(9).innerHTML = "{{ number_format($total1, '2', ',', '.') }}";
                        tmp.item(10).innerHTML = "{{ number_format($total0-$total1, '2', ',', '.') }}";
                        @if($total0 != 0)
                        tmp.item(11).innerHTML = "{{ (($total0-$total1)/$total0)*100 }}";
                        @endif
                    </script>
                @endforeach
                <tr style="border: 1px solid black">
                    <td colspan="5">Jumlah</td>
                    <td class="text-right">{{ number_format($sum0, '2', ',', '.') }}</td>
                    <td colspan="3"></td>
                    <td class="text-right">{{ number_format($sum1, '2', ',', '.') }}</td>
                    <td class="text-right">{{ number_format($sum0-$sum1, '2', ',', '.') }}</td>
                    <td>
                    @if($sum0 != 0)
                    {{ (($sum0-$sum1)/$sum0)*100 }}
                    @endif
                    </td>
                </tr>
            </tbody>

            <tfoot>
                <tr>
                    <td colspan="9"></td>
                    <td colspan="2"><br> Padang <br> <b>Pengguna Anggaran</b></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="9"></td>
                    <td colspan="2" style="height: 50px"></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="9"></td>
                    <td colspan="2"><b><u>Suardi</u></b><br>NIP. </td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="12" class="text-left" style="padding-left: 10px">Keterangan <br> Tanggal Pembahasan <br> Catatan Hasil Pembahasan</td>
                </tr>

                <tr>
                    <td colspan="12" style="height:30px"></td>
                </tr>
            </tfoot>
        </table>

    </div>
    <script>
    window.onload = function () {
        window.print();
    }
    </script>
</body>

</html>
