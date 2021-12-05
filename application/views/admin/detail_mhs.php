<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Kelas <?= $nama_kelas?> || <?= $nama_mapel?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Data Mahasiswa
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <?= $this->session->flashdata('success')?>
                            
                            <a class="btn btn-success" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus"></i> Tambah</a>
                            <hr>
                            <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="myModalLabel">Tambah Mahasiswa</h4>
                                    </div>
                                    <form action="<?= site_url('admin/tambah_detail_mhs')?>" method="post">
                                    <div class="modal-body">
                                        <label>Kelas | Mapel</label>
                                        <input type="" class="form-control" value="<?= $nama_kelas.'/'.$nama_mapel ?>" readonly>
                                        
                                        <input type="hidden" name="id_detail_kelas" value="<?= $id_detail_kelas?>">
                                        <label>Mahasiswa</label>
                                        <select class="form-control" name="id_mahasiswa" required>
                                            <option value="">-pilih-</option>
                                            <?php 
                                            
                                            foreach($mahasiswa as $k){
                                            $cek = $this->db->query('select id_mahasiswa from detail_mhs where id_mahasiswa='.$k->id)->num_rows();
                                            if($nama_mapel != 'Bahasa Inggris'){
                                            
                                            if($cek == 0 ){?>
                                            <option value="<?= $k->id?>"><?= $k->nim.' | '.$k->name?></option>
                                            <?php }
                                            }else{ ?>
                                                <option value="<?= $k->id?>"><?= $k->nim.' | '.$k->name?></option>
                                            <?php } } ?>
                                        </select><br>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-success">Simpan</button>
                                    </div>
                                    </form>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>

                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIM</th>
                                        <th>Nama</th>
                                        <th>Serial Number</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach ($detail_mhs as $key): ?>
                                        
                                    <tr class="odd gradeX">
                                        <td><?= $no++?></td>
                                        <td><?= $key->nim?></td>
                                        <td><?= $key->name?></td>
                                        <td><?= $key->rfid_uid?></td>
                                        <td class="center">
                                        <a class="btn btn-danger" href="<?= site_url('admin/hapus_detail_mhs/'.$key->id_detail_mhs.'/'.$id_detail_kelas)?>" onclick="return confirm('Yakin Hapus Data?')"><i class="fa fa-trash"></i> Hapus</a>
                            <!-- Modal -->
                                        
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