<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Santri</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <?= $this->session->flashdata('success')?>
                        <div class="panel-heading">
                            <?= $title?>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <form action="<?= $action?>" method="post" enctype="multipart/form-data">
                                <div class="col-lg-6">
                                    
                                        <div class="form-group">
                                            <label>Kode Santri</label>
                                            <input class="form-control" name="id_santri" value="<?= $id_santri?>" readonly required>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Nama Santri</label>
                                            <input class="form-control" name="nama_santri" value="<?= $nama_santri?>" required>
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
                                            <label>Tempat Lahir</label>
                                            <input class="form-control" name="tempat_lahir" value="<?= $tempat_lahir?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <textarea class="form-control" rows="3" name="alamat_san" required><?= $alamat_san?></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>No Telepon</label>
                                            <input class="form-control" name="no_telp_san" value="<?= $no_telp_san?>" required>
                                        </div>

                                        
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                    <label>KTP Wali</label>
                                    <img id="uploadPreview" src="<?= base_url('aset/gbr_ktp/'.$ktp_wali)?>" alt="">
                                    <input type="file" accept=".jpg,.png,.jpeg,.jfif" name="ktp_wali" id="upload" onchange="PreviewImage()">
                                    <input type="hidden" name="old" value="<?= $ktp_wali?>">
                                    </div>
                                    <div class="form-group">
                                    <label>Nama Wali</label>
                                    <input class="form-control" name="nama_wali" value="<?= $nama_wali?>" required>
                                    </div>
                                    <div class="form-group">
                                    <label>Username</label>
                                    <input class="form-control" name="username_san" value="<?= $username_san?>" required>
                                    </div>
                                    <div class="form-group">
                                    <label>Passowrd</label>
                                    <input class="form-control" name="password_san" value="<?= $password_san?>" required>
                                    </div>
                                    
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