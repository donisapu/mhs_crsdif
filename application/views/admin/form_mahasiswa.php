<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Mahasiswa</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?= $title?>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <form action="<?= $action?>" method="post" enctype="multipart/form-data">
                                <div class="col-lg-12">
                                    
                                        <div class="form-group">
                                            <label>Serial Number</label>
                                            <input class="form-control" name="serial_number" value="<?= $serial_number?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label>NIM</label>
                                            <input class="form-control" name="nim" value="<?= $nim?>" required>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input class="form-control" name="nama" value="<?= $nama?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Jenis Kelamin</label>
                                            <select class="form-control" name="jenis_kelamin" required>
                                                <?php if ($jenis_kelamin){ ?>
                                                <option value="<?= $jenis_kelamin?>"><?= $jenis_kelamin?></option>
                                                <?php }else{ ?>
                                                <option value="">Pilih</option>
                                                <?php } ?>
                                                <option value="Laki-laki">Laki-laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                                
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Tanggal Lahir</label>
                                            <input type="date" class="form-control" name="tgl_lahir" value="<?= $tgl_lahir?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <textarea class="form-control" rows="3" name="alamat" required><?= $alamat?></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>No Telepon</label>
                                            <input class="form-control" name="no_telp" value="<?= $no_telp?>" required>
                                        </div>

                                    <input type="hidden" name="id_mahasiswa" value="<?= $id_mahasiswa?>">
                                    <button type="submit" class="btn btn-success"><?= $button?></button>
                                    <a href="<?= site_url('admin/santri')?>" class="btn btn-danger">Kembali</a>
                                    
                                </div>
                                </form>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>