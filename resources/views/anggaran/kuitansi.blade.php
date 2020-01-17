<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        .bordertop {
            border-top: 1px solid black;
        }
    </style>

    <title>Cetak kuitansi</title>
</head>
<body>
    <div class="container">
        <table cellspacing="0" cellpadding="5" width="100%">
            <tr>
                <td rowspan="2" colspan="3" width="30%">No.</td>
                <td rowspan="2" width="40%"><h1 class="text-center"><u>KUITANSI</u></h1></td>
                <td width="8%">No.</td>
                <td width="2%">:</td>
                <td width="20%">{{ $kuitansi->detailKegiatan->kegiatan->program->urusan->kode.".".$kuitansi->detailKegiatan->kegiatan->program->organisasi->kode.".".$kuitansi->detailKegiatan->kegiatan->program->kode.".".$kuitansi->detailKegiatan->kegiatan->kode }}</td>
            </tr>

            <tr>
                <td>Kode Rek</td>
                <td>:</td>
                <td>{{ $kuitansi->detailKegiatan->sub4Uraian->sub3Uraian->sub2Uraian->subUraian->uraian->rekening.".".$kuitansi->detailKegiatan->sub4Uraian->sub3Uraian->sub2Uraian->subUraian->rekening.".".$kuitansi->detailKegiatan->sub4Uraian->sub3Uraian->sub2Uraian->rekening.".".$kuitansi->detailKegiatan->sub4Uraian->sub3Uraian->rekening.".".$kuitansi->detailKegiatan->sub4Uraian->rekening }}</td>
            </tr>

            <tr>
                <td width="20%">Sudah diterima dari</td>
                <td width="2%">:</td>
                <td colspan="5">{{ $kuitansi->terima_dari }}</td>
            </tr>

            <tr>
                <td><b>Uang Sejumlah</b></td>
                <?php
                        $uang = 0;
                        foreach($kuitansi->detailKuitansi as $k){
                            $uang += $k->harga_satuan*$k->volume;
                        }
                    ?>
                <td colspan="6"><b>{{ "Rp ".number_format($uang, '2', ',', '.') }}</b></td>
            </tr>

            <tr>
                <td colspan="7"><b style="margin-left:50px;">Seratus Ribu</b></td>
            </tr>

            <tr>
                <td >Sebab Dari</td>
                <td colspan="6">{{ $kuitansi->sebab }} Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aliquid dolore rem, illum eaque in optio deserunt perferendis illo tenetur placeat officiis, earum eius delectus, tempore doloribus unde nihil atque eveniet?</td>
            </tr>
        </table>



        <!-- tabel 2 -->
        <table cellspacing="0" cellpadding="5" width="100%" style="margin-top:50px;"> 
            <tr>
                <!-- Kolom kiri -->
                <td width="35%" style="font-size:14px">
                    <div style="border:1px solid black; padding:8px">
                        <table cellspacing="0" width="100%" rules="rows">
                            <tr>
                                <td width="20%">Diterima</td>
                                <td width="10%" rowspan="2">tgl.</td>
                                <td width="2%"rowspan="2">:</td>
                                <td rowspan="2">01012020</td>
                            </tr>

                            <tr>
                                <td>Dibayar</td>
                            </tr>

                            <tr>
                                <td>Dibukukan</td>
                                <td>tgl</td>
                                <td>:</td>
                                <td colspan="2">02022020</td>
                            </tr>

                            <tr>
                                <td colspan="3">No. Folio Buku Kas</td>
                                <td>12345</td>
                            </tr>

                            <tr>
                                <td colspan="4" style="font-size:12px">Barang-barang yang dibeli ini telah diterima dalam keadaan baik dan telah dibukukan sebagai barang inventaris/stock dalam daftar inventaris/stock.</td>
                            </tr>

                            <tr>
                                <td width="100%" colspan="4">
                                    <table cellspacing="0" width="100%">
                                        <tr>
                                            <td width="10%">No.</td>
                                            <td width="40%"> .........</td>
                                            <td width="10%">tgl. </td>
                                            <td width="40%"> ........</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>

                            <tr>
                                <td width="100%" colspan="4">
                                    <table cellspacing="0" width="100%">
                                        <tr>
                                            <td width="10%">Oleh</td>
                                            <td width="3%">:</td>
                                            <td>Nadilla Syihaq</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </div>
                </td>
                
                



                <!-- Kolom Tengah -->
                <td width="30%" style="text-align:center; font-size:12px">
                    <table cellspacing="0" width="100%">
                        <tr>
                            <td>Setuju dibayar,</td>
                        </tr>

                        <tr>
                            <td>Pengguna Anggaran</td>
                        </tr>

                        <tr style="height:50px"></tr>

                        <tr>
                            <td style="font-size:14px"><b>Suardi, SH, M.Hum</b></td>
                        </tr>

                        <tr>
                            <td style="font-size:14px">NIP. 196109051982031008</td>
                        </tr>

                        <tr>
                            <td>Lunas dibayar</td>
                        </tr>

                        <tr>
                            <td>Pemegang Kas</td>
                        </tr>

                        <tr style="height:70px"></tr>

                        <tr>
                            <td style="font-size:14px"><b>Cel Indra, SE</b></td>
                        </tr>

                        <tr>
                            <td style="font-size:14px">NIP. 198706152015021001</td>
                        </tr>
                    </table>
                </td>


                <td width="30%" style="font-size:14px">
                    <table cellspacing="0" cellpadding="5" width="100%">
                        <tr>
                            <td colspan="2">Padang, ................................... </td>
                        </tr>

                        <tr>
                            <td colspan="2" style="text-align:center">Yang terima</td>
                        </tr>

                        <tr style="height:100px"></tr>

                        <tr>
                            <td width="30%">Nama Terang</td>
                            <td>Nadilla Syihaq</td>
                        </tr>

                        <tr>
                            <td>Alamat Terang</td>
                            <td>Jln. Drs. Moh. Hatta, Kapalo Koto, No. 5</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>