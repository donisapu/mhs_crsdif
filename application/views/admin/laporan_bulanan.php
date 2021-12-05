<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Laporan Pembayaran Bulanan</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Laporan Pembayaran Bulanan
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            
                            <form style="padding-bottom:20px;" class="form-inline" method="get" action="<?php echo site_url('admin/laporan_bulanan');?>" style="padding-bottom:20px;">
                            
                                <div class="input-group" style="margin-right:10px;">
                                    <label>Bulan</label>
                                    <select type="" class="form-control" name="bulan" class="form-control">
                                        <option value="<?php echo $bulan;?>"><?php echo $bulan;?></option>
                                        <option value="Januari">Januari</option>
                                        <option value="Februari">Februari</option>
                                        <option value="Maret">Maret</option>
                                        <option value="April">April</option>
                                        <option value="Mei">Mei</option>
                                        <option value="Juni">Juni</option>
                                        <option value="Juli">Juli</option>
                                        <option value="Agustus">Agustus</option>
                                        <option value="September">September</option>
                                        <option value="November">November</option>
                                        <option value="Desember">Desember</option>
                                    </select>
                                </div>
                                
                                <div class="input-group" style="margin-right:5px;">
                                    <label>Tahun</label>
                                    <select type="" class="form-control" name="tahun" class="form-control">
                                        <option value="<?php echo $tahun;?>"><?php echo $tahun;?></option>
                                        <option value="2015">2015</option>
                                        <option value="2016">2016</option>
                                        <option value="2017">2017</option>
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                    </select>
                                </div>
                                                                             
                                <button type="submit" class="btn btn-primary" style="margin-right:5px;">Pilih</button>
                                <a href="<?php echo site_url('admin/cetak_laporan_bulanan?bulan='.$bulan.'&tahun='.$tahun);?>" target="_blank" class="btn btn-warning" style="margin-right:5px;">Print</a>
                                <a href="<?php echo site_url('admin/laporan_bulanan')?>" class="btn btn-success">Refresh</a>
                            </form>
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Bulan/Tahun</th>
                                        <th>ID Pembayaran</th>
                                        <th>Nama Santri</th>
                                        <th>Nominal Bayar</th>
                                        <th>Penanggung Jawab</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $total=0; $no=1; foreach ($laporan_bulanan as $key){
                                     if($key->status_bayar_bulanan=='Sudah Bayar'){?>
                                        
                                    <tr class="odd gradeX">
                                        <td><?= $no++?></td>
                                        <td><?= $key->bulan.'/'.$key->tahun?></td>
                                        <td><?= $key->id_detail_pembayaran_bulanan?></td>
                                        <td><?= $key->nama_santri?></td>
                                        <td><?= 'Rp. '.number_format($key->nominal_bayar).',-'?></td>
                                        <td><?= $key->nama_pengguna?></td>
                                        
                                    </tr>
                                    <?php 
                                    $total=$total+$key->nominal_bayar;
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

        