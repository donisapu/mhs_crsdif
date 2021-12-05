<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Data Pembayaran Bulan</h1>
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
                            
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Bulan/Tahun</th>
                                        <th>ID Pembayaran</th>
                                        <th>Nama Santri</th>
                                        <th>Nominal Bayar</th>
                                        <th>Tgl Pembayaran</th>
                                        <th>Penanggung Jawab</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php $no=1; foreach ($detail_bulanan as $key){ 
                                    if($key->id_santri==$this->session->id_santri){?>
                                        
                                    <tr class="odd gradeX">
                                        <td><?= $no++?></td>
                                        <td><?= $key->bulan.'/'.$key->tahun?></td>
                                        <td><?= $key->id_detail_pembayaran_bulanan?></td>
                                        <td><?= $key->nama_santri?></td>
                                        <td><?= 'Rp. '.number_format($key->nominal_bayar).',-'?></td>
                                        <td><?= $key->tgl_pembayaran?></td>
                                        <td><?= $key->nama_pengguna?></td>
                                        <td class="center" width="17%">
                                        <?php if($key->status_bayar_bulanan=='Belum Bayar'){?>
                                        <a class="btn btn-info" data-toggle="modal" data-target="#edit<?= $key->id_detail_pembayaran_bulanan?>"><i class="fa fa-edit"></i> Bayar Sekarang</a>
                                        <?php }elseif($key->status_bayar_bulanan=='Tunggu Konfirmasi'){?>
                                        <label class="label label-warning"></i> Tunggu Konfirmasi</label>
                                        <?php }else{ ?>
                                        <label class="label label-success"></i> Sudah Bayar</label>
                                        <a title="Cetak Bukti" target="_blank" class="btn btn-info btn-sm" href="<?= site_url('santri/cetak_bukti_bulanan/'.$key->id_detail_pembayaran_bulanan)?>"><i class="fa fa-print"></i>Cetak</a>
                                        <?php } ?>
                                        
                                        </td>
                                    </tr>
                                    <?php } }
                                    ?>
                                    
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

        <?php $no=1; foreach ($detail_bulanan as $key): ?>
        <div class="modal fade" id="edit<?= $key->id_detail_pembayaran_bulanan?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Pembayaran Bulanan</h4>
                </div>
                <form action="<?= site_url('santri/edit_detail_pembayaran_bulanan/'.$key->id_detail_pembayaran_bulanan)?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <label>ID Pembayaran</label>
                    <input type="text" class="form-control" name="id_detail_pembayaran_bulanan" value="<?= $key->id_detail_pembayaran_bulanan?>" readonly required><br>
                     <label>Santri</label>
                    <select class="form-control" name="id_santri" readonly required>
                        <option value="<?= $key->id_santri?>"><?= $key->id_santri.' | '.$key->nama_santri?></option>
                        <?php foreach ($santri as $k): ?>
                            <option value="<?= $k->id_santri?>"><?= $k->id_santri.' | '.$k->nama_santri?></option>
                        <?php endforeach ?>
                    </select><br>
                    <label>Nominal Bayar(harus dibayarkan sesuai nominal)</label>
                    <input type="number" class="form-control" name="nominal_bayar" value="<?= $nominal_bayar?>" readonly required><br>
                    <label>Bukti Bayar</label><br>
                    <img src="<?= base_url('aset/bukti_bayar/'.$key->bukti_bayar_bulanan)?>" id="uploadPreview1" alt="" width="50%">
                    <input type="hidden" name="old" value="<?= $key->bukti_bayar_bulanan?>">
                    <input id="upload1" onchange="PreviewImage1()" type="file" class="form-control" name="bukti_bayar" required><br>
                    <input type="hidden" name="id_pembayaran_bulanan" value="<?= $key->id_pembayaran_bulanan?>">
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