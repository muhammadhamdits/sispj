@extends('_templates/layout')

@section('content')
    <div class="main">
        <div class="panel panel-headline">
            <div class="panel-heading">
                <h3 class="panel-title">Summary Overview</h3>
                <p class="panel-subtitle">Periode: 2019 - Sebelum Perubahan</p>
            </div>
            <div class="panel-body">
                @if(Auth::user()->role != 0)
                <div class="row">
                    <div class="col-md-4">
                        <div class="metric">
                            <span class="icon"><i class="fa fa-calendar-check-o"></i></span>
                            <p>
                                <?php
                                    $jumlahKegiatan = 0;
                                    $pagu = 0;
                                    $paguPerubahan = 0;
                                    foreach(\Auth::user()->organisasi->program as $program){
                                        foreach($program->kegiatan as $kegiatan){
                                            $jumlahKegiatan++;
                                            foreach($kegiatan->detailKegiatan as $detailKegiatan){
                                                foreach($detailKegiatan->detailItem as $detailItem){
                                                    if($detailItem->status == 0){
                                                        $pagu += $detailItem->harga_satuan * $detailItem->volume;
                                                    }else{
                                                        $paguPerubahan += $detailItem->harga_satuan * $detailItem->volume;
                                                    }
                                                }
                                            }
                                        }
                                    }
                                ?>
                                <span class="number">{{ $jumlahKegiatan." / ".count(Auth::user()->organisasi->program) }}</span>
                                <span class="title">Kegiatan / Program</span>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="metric">
                            <span class="icon"><i class="fa fa-money"></i></span>
                            <p>
                                <span class="number">{{ "Rp ".number_format($pagu, '2', ',', '.') }}</span>
                                <span class="title">Pagu</span>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="metric">
                            <span class="icon"><i class="fa fa-money"></i></span>
                            <p>
                                <span class="number">{{ "Rp ".number_format($paguPerubahan, '2', ',', '.') }}</span>
                                <span class="title">Pagu Perubahan</span>
                            </p>
                        </div>
                    </div>
                </div>
                @else
                    <div class="row">
                        <div class="col-md-4">
                            <div class="metric">
                                <span class="icon"><i class="fa fa-tasks"></i></span>
                                <p>
                                    <span class="number">{{ count(\App\Urusan::all()) }}</span>
                                    <span class="title">Urusan</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="metric">
                                <span class="icon"><i class="fa fa-users"></i></span>
                                <p>
                                    <span class="number">{{ count(\App\Organisasi::all()) }}</span>
                                    <span class="title">Organisasi</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="metric">
                                <span class="icon"><i class="fa fa-user"></i></span>
                                <p>
                                    <span class="number">{{ count(\App\User::all()) }}</span>
                                    <span class="title">User</span>
                                </p>
                            </div>
                        </div>
                    </div>
                @endif
                <!-- <div class="row">
                    <div class="col-md-9">
                        <div id="headline-chart" class="ct-chart"></div>
                    </div>
                    <div class="col-md-3">
                        <div class="weekly-summary text-right">
                            <span class="number">2,315</span> <span class="percentage"><i class="fa fa-caret-up text-success"></i> 12%</span>
                            <span class="info-label">Total Sales</span>
                        </div>
                        <div class="weekly-summary text-right">
                            <span class="number">$5,758</span> <span class="percentage"><i class="fa fa-caret-up text-success"></i> 23%</span>
                            <span class="info-label">Monthly Income</span>
                        </div>
                        <div class="weekly-summary text-right">
                            <span class="number">$65,938</span> <span class="percentage"><i class="fa fa-caret-down text-danger"></i> 8%</span>
                            <span class="info-label">Total Income</span>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
@endsection