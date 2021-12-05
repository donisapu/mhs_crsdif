<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Laporan Pengeluaran</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Laporan Pengeluaran
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            
                            <form style="padding-bottom:20px;" class="form-inline" method="get" action="<?php echo site_url('admin/laporan_pengeluaran');?>" style="padding-bottom:20px;">
                            
                                <div class="input-group" style="margin-right:10px;">
                                    <label>Dari Tanggal</label>
                                    <input type="date" name="tgl1" class="form-control"  placeholder="Dari Tanggal" value="<?php echo $tgl1;?>">
                                </div>
                                
                                <div class="input-group" style="margin-right:5px;">
                                    <label>Sampai Tanggal</label>
                                    <input type="date" name="tgl2" class="form-control" placeholder="Sampai Tanggal"  value="<?php echo $tgl2;?>">
                                </div>
                                                                             
                                <button type="submit" class="btn btn-primary" style="margin-right:5px;">Pilih</button>
                                <a href="<?php echo site_url('admin/cetak_laporan_pengeluaran?tgl1='.$tgl1.'&tgl2='.$tgl2);?>" target="_blank" class="btn btn-warning" style="margin-right:5px;">Print</a>
                                <a href="<?php echo site_url('admin/laporan_pengeluaran')?>" class="btn btn-success">Refresh</a>
                            </form>
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Pengeluaran</th>
                                        <th>Nama Barang</th>
                                        <th>Hara Satuan</th>
                                        <th>Jumlah</th>
                                        <th>Subtotal</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $total=0; $no=1; foreach ($laporan_pengeluaran as $key): ?>
                                        
                                    <tr class="odd gradeX">
                                        <td><?= $no++?></td>
                                        <td><?= $key->id_pengeluaran?></td>
                                        <td><?= $key->nama_barang?></td>
                                        <td><?= 'Rp. '.number_format($key->harga_satuan).',-'?></td>
                                        <td><?= $key->jumlah?></td>
                                        <td><?= 'Rp. '.number_format($key->subtotal).',-'?></td>
                                        
                                    </tr>
                                    <?php
                                    $total=$total+$key->subtotal;
                                     endforeach ?>
                                    <tr>
                                        <td colspan="5">Total</td>
                                        <td><?= 'Rp. '.number_format($total).',-'?></td>
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

        