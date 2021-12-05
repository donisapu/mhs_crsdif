<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Laporan Angsuran Pembayaran Bangunan</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Laporan Angsuran Pembayaran Bangunan
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            
                            <form style="padding-bottom:20px;" class="form-inline" method="get" action="<?php echo site_url('admin/laporan_bangunan');?>" style="padding-bottom:20px;">
                            
                                <div class="input-group" style="margin-right:10px;">
                                    <label>Dari Tanggal</label>
                                    <input type="date" name="tgl1" class="form-control"  placeholder="Dari Tanggal" value="<?php echo $tgl1;?>">
                                </div>
                                
                                <div class="input-group" style="margin-right:5px;">
                                    <label>Sampai Tanggal</label>
                                    <input type="date" name="tgl2" class="form-control" placeholder="Sampai Tanggal"  value="<?php echo $tgl2;?>">
                                </div>
                                                                             
                                <button type="submit" class="btn btn-primary" style="margin-right:5px;">Pilih</button>
                                <a href="<?php echo site_url('admin/cetak_laporan_bangunan?tgl1='.$tgl1.'&tgl2='.$tgl2);?>" target="_blank" class="btn btn-warning" style="margin-right:5px;">Print</a>
                                <a href="<?php echo site_url('admin/laporan_bangunan')?>" class="btn btn-success">Refresh</a>
                            </form>
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Pembayaran</th>
                                        <th>Nama Santri</th>
                                        <th>Tanggal Angsur</th>
                                        <th>Nominal Angsuran</th>
                                        <th>Penanggung Jawab</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $total=0; $no=1; foreach ($laporan_bangunan as $key){
                                     if($key->status_bayar_bangunan=='Sudah Bayar'){?>
                                        
                                    <tr class="odd gradeX">
                                        <td><?= $no++?></td>
                                        <td><?= $key->id_pembayaran_bangunan?></td>
                                        <td><?= $key->nama_santri?></td>
                                        <td><?= $key->tgl_bayar?></td>
                                        <td><?= 'Rp. '.number_format($key->nominal_angsur).',-'?></td>
                                        <td><?= $key->nama_pengguna?></td>
                                        
                                    </tr>
                                    <?php 
                                    $total=$total+$key->nominal_angsur;
                                    } } ?>
                                    <tr>
                                        <td colspan="4"> Total </td>
                                        <td colspan="2"><?= 'Rp. '.number_format($total).',-'?></td>
                                    </tr>
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

        