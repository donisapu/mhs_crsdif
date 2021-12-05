<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Data Pembayaran Bangunan</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Data Pembayaran Bangunan
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <?= $this->session->flashdata('success')?>
                            
                           
                        </div>

                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Pembayaran</th>
                                        <th>Nama Santri</th>
                                        <th>Biaya Bangunan</th>
                                        <th>Banyak Angsuran</th>
                                        <th>Penanggung Jawab</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach ($pembayaran_bangunan as $key){ 
                                        if($key->id_santri==$this->session->id_santri){?>
                                        
                                    <tr class="odd gradeX">
                                        <td><?= $no++?></td>
                                        <td><?= $key->id_pembayaran_bangunan?></td>
                                        <td><?= $key->nama_santri?></td>
                                        <td><?= 'Rp. '.number_format($key->biaya_bangunan).',-'?></td>
                                        <td><?= $key->banyak_angsuran?></td>
                                        <td><?= $key->nama_pengguna?></td>
                                        <td class="center">
                                        <a class="btn btn-info btn-sm" href="<?= site_url('santri/detail_pembayaran_bangunan/'.$key->id_pembayaran_bangunan)?>"><i class="fa fa-eye"></i> Angsuran</a>
                                        
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

        <?php $no=1; foreach ($pembayaran_bangunan as $key): ?>
        <div class="modal fade" id="edit<?= $key->id_pembayaran_bangunan?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Edit Pembayaran Bangunan</h4>
                </div>
                <form action="<?= site_url('bendahara/edit_pembayaran_bangunan/'.$key->id_pembayaran_bangunan)?>" method="post">
                <div class="modal-body">
                    <label>Santri</label>
                    <select class="form-control" name="id_santri" required>
                        <option value="<?= $key->id_santri?>"><?= $key->id_santri.' | '.$key->nama_santri?></option>
                        <?php foreach ($santri as $k): ?>
                            <option value="<?= $k->id_santri?>"><?= $k->id_santri.' | '.$k->nama_santri?></option>
                        <?php endforeach ?>
                    </select><br>
                    <label>Biaya Bangunan</label>
                    <input type="number" class="form-control" name="biaya_bangunan" value="<?= $key->biaya_bangunan?>" required><br>
                    <label>Banyak Angsuran</label>
                    <input type="number" class="form-control" name="banyak_angsuran" value="<?= $key->banyak_angsuran?>" required><br>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Ubah</button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <?php endforeach ?>