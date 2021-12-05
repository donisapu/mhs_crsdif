

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-12 text-right">
                                    <h2><?= $jumlah_mhs->num_rows().' Orang'?></h2>
                                    <div>Mahasiswa Aktif</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?= site_url('admin/mahasiswa')?>">
                            <div class="panel-footer">
                                <span class="pull-left">Lihat Detail</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-12 text-right">
                                    <h2><?= $jumlah_kelas->num_rows() ?></h2>
                                    <div>Jumlah Kelas</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?= site_url('admin/kelas')?>">
                            <div class="panel-footer">
                                <span class="pull-left">Lihat Detail</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-12 text-right">
                                    <h2><?= $jumlah_mapel->num_rows() ?></h2>
                                    <div>Jumlah Mapel</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?= site_url('admin/mapel')?>">
                            <div class="panel-footer">
                                <span class="pull-left">Lihat Detail</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-list"></i> Sistem Absen CRSDIF
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <h1>Selamat Datang di sistem absensi CRSDIF mahasiswa</h1>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    
                </div>
                
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->