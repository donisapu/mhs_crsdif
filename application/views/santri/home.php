<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Data Informasi</h1>
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
                            <?= $this->session->flashdata('success')?>
                            
                            <!-- /.modal-dialog -->
                        </div>

                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul Informasi</th>
                                        <th>Isi Info</th>
                                        <th>Status Publish</th>
                                        <th>Author</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach ($informasi as $key){
                                    if($key->status_publish=='Publish'){ ?>
                                        
                                    <tr class="odd gradeX">
                                        <td><?= $no++?></td>
                                        <td><?= $key->judul_informasi?></td>
                                        <td><?= substr($key->isi_info, 0,50)?></td>
                                        <td><?= $key->status_publish?></td>
                                        <td><?= $key->nama_pengguna?></td>
                                        <td class="center" width="20%">
                                        <a class="btn btn-info btn-sm" href="<?= site_url('santri/detail_informasi/'.$key->id_informasi)?>"><i class="fa fa-eye"></i> Lihat</a>
                                        </td>
                                    </tr>
                                    <?php } } ?>
                                    
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
        </div>

       