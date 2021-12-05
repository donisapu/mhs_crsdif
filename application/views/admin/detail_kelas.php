<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Pengelompokan Kelas</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Pengelompokan Kelas
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
                                        <h4 class="modal-title" id="myModalLabel">Tambah Kelas</h4>
                                    </div>
                                    <form action="<?= site_url('admin/tambah_detail_kelas')?>" method="post">
                                    <div class="modal-body">
                                        <label>Kelas</label>
                                        <select class="form-control" name="id_kelas" required>
                                            <option value="">-pilih-</option>
                                            <?php foreach($kelas as $k){?>
                                            <option value="<?= $k->id_kelas?>"><?= $k->nama_kelas?></option>
                                            <?php } ?>
                                        </select><br>
                                        <label>Mapel</label>
                                        <select class="form-control" name="id_mapel" required>
                                            <option value="">-pilih-</option>
                                            <?php foreach($mapel as $k){?>
                                            <option value="<?= $k->id_mapel?>"><?= $k->nama_mapel?></option>
                                            <?php } ?>
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
                                        <th>Kelas</th>
                                        <th>Mapel</th>
                                        <th>Mahasiswa</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach ($detail_kelas as $key): ?>
                                        
                                    <tr class="odd gradeX">
                                        <td><?= $no++?></td>
                                        <td><?= $key->nama_kelas?></td>
                                        <td><?= $key->nama_mapel?></td>
                                        <td><a href="<?= site_url('admin/detail_mhs/'.$key->id_detail_kelas)?>" class="btn btn-primary">Detail</a> </td>
                                        <td class="center">
                                        <a class="btn btn-success" data-toggle="modal" data-target="#edit<?= $key->id_detail_kelas?>"><i class="fa fa-edit"></i> Edit</a>
                                        <a class="btn btn-danger" href="<?= site_url('admin/hapus_detail_kelas/'.$key->id_detail_kelas)?>" onclick="return confirm('Yakin Hapus Data?')"><i class="fa fa-trash"></i> Hapus</a>
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

        <?php $no=1; foreach ($detail_kelas as $key): ?>
        <div class="modal fade" id="edit<?= $key->id_detail_kelas?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Edit Kelas</h4>
                </div>
                <form action="<?= site_url('admin/edit_detail_kelas/'.$key->id_detail_kelas)?>" method="post">
                <div class="modal-body">
                    <label>Kelas</label>
                    <select class="form-control" name="id_kelas" required>
                        <option value="<?= $key->id_kelas?>"><?= $key->nama_kelas?></option>
                        <?php foreach($kelas as $k){?>
                        <option value="<?= $k->id_kelas?>"><?= $k->nama_kelas?></option>
                        <?php } ?>
                    </select><br>
                    <label>Mapel</label>
                    <select class="form-control" name="id_mapel" required>
                        <option value="<?= $key->id_mapel?>"><?= $key->nama_mapel?></option>
                        <?php foreach($mapel as $k){?>
                        <option value="<?= $k->id_mapel?>"><?= $k->nama_mapel?></option>
                        <?php } ?>
                    </select><br>
                    
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