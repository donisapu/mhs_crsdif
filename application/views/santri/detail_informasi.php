<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Detail Data Informasi</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Data Informasi
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Detail
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <tbody>
                                                <tr>
                                                    <td>Gambar</td>
                                                    <td> : </td>
                                                    <td><img width="30%" src="<?= base_url('aset/gbr_info/'.$informasi->gambar);?>"></td>
                                                </tr>
                                                <tr>
                                                    <td>Judul informasi</td>
                                                    <td> : </td>
                                                    <td><?= $informasi->judul_informasi?></td>
                                                </tr>
                                                <tr>
                                                    <td>Isi Info</td>
                                                    <td> : </td>
                                                    <td><?= $informasi->isi_info?></td>
                                                </tr>
                                                <tr>
                                                    <td>Status Publish</td>
                                                    <td> : </td>
                                                    <td><?= $informasi->status_publish?></td>
                                                </tr>
                                                <tr>
                                                    <td>Author</td>
                                                    <td> : </td>
                                                    <td><?= $informasi->nama_pengguna?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    
                                    <a href="<?= site_url('santri')?>" class="btn btn-danger">Kembali</a>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.panel-body -->
                            </div>
                        </div>
                            <!-- /.table-responsive -->
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
        </div>

       