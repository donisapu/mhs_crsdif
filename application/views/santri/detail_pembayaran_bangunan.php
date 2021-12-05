<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Data Angsuran Pembayaran Bangunan</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Data Angsuran Pembayaran Bangunan ID : <?= $id_pembayaran_bangunan?>
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
                                        <th>Sisa Angsuran</th>
                                        <th>Nominal Angsuran</th>
                                        <th>Penanggung Jawab</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach ($detail_bangunan as $key): ?>
                                        
                                    <tr class="odd gradeX">
                                        <td><?= $no++?></td>
                                        <td><?= $key->id_pembayaran_bangunan?></td>
                                        <td><?= $key->nama_santri?></td>
                                        <td><?= 'Rp. '.number_format($key->biaya_bangunan).',-'?></td>
                                        <td><?= $key->sisa_angsuran.' kali lagi'?></td>
                                        <td><?= 'Rp. '.number_format($key->nominal_angsur).',-'?></td>
                                        <td><?= $key->nama_pengguna?></td>
                                        <td class="center" width="15%">
                                        <?php if($key->status_bayar_bangunan=='Belum Bayar'){?>
                                        <a class="btn btn-info" data-toggle="modal" data-target="#edit<?= $key->id_detail_angsuran_bangunan?>"><i class="fa fa-edit"></i> Bayar Sekarang</a>
                                        <?php }elseif($key->status_bayar_bangunan=='Tunggu Konfirmasi'){?>
                                        <label class="label label-warning"></i> Tunggu Konfirmasi</label>
                                        <?php }else{ ?>
                                        <label class="label label-success"></i> Sudah Bayar</label>
                                        <a title="Cetak Bukti" target="_blank" class="btn btn-info btn-sm" href="<?= site_url('santri/cetak_bukti_bangunan/'.$key->id_detail_angsuran_bangunan)?>"><i class="fa fa-print"></i>Cetak</a>
                                        <?php } ?>    
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

        <?php $no=1; foreach ($detail_bangunan as $key): ?>
        <div class="modal fade" id="edit<?= $key->id_detail_angsuran_bangunan?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Pembayaran Bangunan</h4>
                </div>
                <form action="<?= site_url('santri/edit_detail_pembayaran_bangunan/'.$key->id_detail_angsuran_bangunan)?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <label>ID Pembayaran</label>
                    <input type="text" class="form-control" name="id_pembayaran_bangunan" value="<?= $id_pembayaran_bangunan?>" readonly required><br>
                    <label>Nominal Angsur(harus dibayarkan sesuai nominal)</label>
                    <input type="number" class="form-control" name="nominal_angsur" value="<?= $nominal_angsur?>" readonly required><br>
                    <label>Bukti Bayar</label><br>
                    <img src="<?= base_url('aset/bukti_bayar/'.$key->bukti_bayar_bangunan)?>" id="uploadPreview1" alt="" width="50%">
                    <input type="hidden" name="old" value="<?= $key->bukti_bayar_bangunan?>">
                    <input id="upload1" onchange="PreviewImage1()" type="file" class="form-control" name="bukti_bayar" required><br>
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