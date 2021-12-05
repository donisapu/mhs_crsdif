<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Data Pembayaran Bulanan</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Data Pembayaran Bulanan
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <?= $this->session->flashdata('success')?>
                            
                        </div>

                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Bulan</th>
                                        <th>Tahun</th>
                                        <th>Biaya bulanan</th>
                                        <th>Penanggung Jawab</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach ($pembayaran_bulanan as $key): ?>
                                        
                                    <tr class="odd gradeX">
                                        <td><?= $no++?></td>
                                        <td><?= $key->bulan?></td>
                                        <td><?= $key->tahun?></td>
                                        <td><?= 'Rp. '.number_format($key->biaya_bulanan).',-'?></td>
                                        <td><?= $key->nama_pengguna?></td>
                                        <td class="center">
                                        <a class="btn btn-info btn-sm" href="<?= site_url('santri/detail_pembayaran_bulanan/'.$key->id_pembayaran_bulanan)?>"><i class="fa fa-eye"></i> Detail</a>
                                        
                                        </td>
                                    </tr>
                                    <?php endforeach ?>
                                    
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

        <?php $no=1; foreach ($pembayaran_bulanan as $key): ?>
        <div class="modal fade" id="edit<?= $key->id_pembayaran_bulanan?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Edit Pembayaran bulanan</h4>
                </div>
                <form action="<?= site_url('bendahara/edit_pembayaran_bulanan/'.$key->id_pembayaran_bulanan)?>" method="post">
                <div class="modal-body">
                    <label>Bulan</label>
                    <input type="text" class="form-control" name="bulan" value="<?= $key->bulan?>" required><br>
                    <label>Tahun</label>
                    <input type="number" class="form-control" name="tahun" value="<?= $key->tahun?>" required><br>
                    <label>Biaya Bulanan</label>
                    <input type="number" class="form-control" name="biaya_bulanan" value="<?= $key->biaya_bulanan?>" required><br>

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