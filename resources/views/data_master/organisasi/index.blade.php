@extends('../../_templates/layout')

@section('content')
<!-- OVERVIEW -->
<div class="panel panel-headline">
    <div class="panel-heading">
        <h3 class="panel-title">Kelola data master</h3>
        <p class="panel-subtitle">Period: Oct 14, 2016 - Oct 21, 2016</p>
    </div>
    <div class="panel-body">
        <!-- TABBED CONTENT -->
        <div class="custom-tabs-line tabs-line-bottom left-aligned">
            <ul class="nav" role="tablist">
                <li class="active"><a href="#tab-organisasi" role="tab" data-toggle="tab">Organisasi</a></li>
                <li><a href="#tab-urusan" role="tab" data-toggle="tab">Urusan</a></li>
                <li><a href="#tab-program" role="tab" data-toggle="tab">Program</a></li>
                <li><a href="#tab-kegiatan" role="tab" data-toggle="tab">Kegiatan</a></li>
                <li><a href="#tab-periode" role="tab" data-toggle="tab">Periode</a></li>
            </ul>
        </div>
        <div class="tab-content">
            <!-- Konten tab organisasi -->
            <div class="tab-pane fade in active" id="tab-organisasi">
                <div class="row">
                    <a class="btn btn-success update-pro" href="" title="Tambah data organisasi" target="_blank"><i class="fa fa-plus"></i> <span> Add Data</span></a>
                </div>
                <br>
                <div class="table-responsive">
                    <table class="table project-table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Progress</th>
                                <th>Leader</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><a href="#">Spot Media</a></td>
                                <td>aaa</td>
                                <td>aaa</td>
                                <td><span class="label label-success">ACTIVE</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Konten tab urusan -->
            <div class="tab-pane fade in" id="tab-urusan">
                <div class="table-responsive">
                    <table class="table project-table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Progress</th>
                                <th>Leader</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><a href="#">Spot Media</a></td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                                            <span>60% Complete</span>
                                        </div>
                                    </div>
                                </td>
                                <td><img src="assets/img/user2.png" alt="Avatar" class="avatar img-circle"> <a href="#">Michael</a></td>
                                <td><span class="label label-success">ACTIVE</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Konten tab program -->
            <div class="tab-pane fade in" id="tab-program">
                <div class="table-responsive">
                    <table class="table project-table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Progress</th>
                                <th>Leader</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><a href="#">Spot Media</a></td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                                            <span>60% Complete</span>
                                        </div>
                                    </div>
                                </td>
                                <td><img src="assets/img/user2.png" alt="Avatar" class="avatar img-circle"> <a href="#">Michael</a></td>
                                <td><span class="label label-success">ACTIVE</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Konten tab kegiatan -->
            <div class="tab-pane fade in" id="tab-kegiatan">
                <div class="table-responsive">
                    <table class="table project-table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Progress</th>
                                <th>Leader</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><a href="#">Spot Media</a></td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                                            <span>60% Complete</span>
                                        </div>
                                    </div>
                                </td>
                                <td><img src="assets/img/user2.png" alt="Avatar" class="avatar img-circle"> <a href="#">Michael</a></td>
                                <td><span class="label label-success">ACTIVE</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Konten tab periode -->
            <div class="tab-pane fade in" id="tab-periode">
                <div class="table-responsive">
                    <table class="table project-table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Progress</th>
                                <th>Leader</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><a href="#">Spot Media</a></td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                                            <span>60% Complete</span>
                                        </div>
                                    </div>
                                </td>
                                <td><img src="assets/img/user2.png" alt="Avatar" class="avatar img-circle"> <a href="#">Michael</a></td>
                                <td><span class="label label-success">ACTIVE</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Akhir konten masing-masing tab -->
        </div>
        <!-- END TABBED CONTENT -->
    </div>
</div>
<!-- END OVERVIEW -->
@endsection