<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Data Mapel</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Data Mapel
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
                                        <h4 class="modal-title" id="myModalLabel">Tambah Mapel</h4>
                                    </div>
                                    <form action="<?= site_url('admin/tambah_mapel')?>" method="post">
                                    <div class="modal-body">
                                        <label>Nama Mapel</label>
                                        <input type="text" class="form-control" name="nama_mapel" required><br>
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
                                        <th>Nama Mapel</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach ($mapel as $key): ?>
                                        
                                    <tr class="odd gradeX">
                                        <td><?= $no++?></td>
                                        <td><?= $key->nama_mapel?></td>
                                        <td class="center">
                                        <a class="btn btn-success" data-toggle="modal" data-target="#edit<?= $key->id_mapel?>"><i class="fa fa-edit"></i> Edit</a>
                                        <a class="btn btn-danger" href="<?= site_url('admin/hapus_mapel/'.$key->id_mapel)?>" onclick="return confirm('Yakin Hapus Data?')"><i class="fa fa-trash"></i> Hapus</a>
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

        <?php $no=1; foreach ($mapel as $key): ?>
        <div class="modal fade" id="edit<?= $key->id_mapel?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Edit Mapel</h4>
                </div>
                <form action="<?= site_url('admin/edit_mapel/'.$key->id_mapel)?>" method="post">
                <div class="modal-body">
                    <label>Nama Mapel</label>
                    <input type="text" value="<?= $key->nama_mapel?>" class="form-control" name="nama_mapel" required><br>
                    
                    <!-- <label>Level</label>
                    <select class="form-control" name="level" required>
                        <option value="<?= $key->level?>"><?= $key->level?></option>
                        <option value="Admin">Admin</option>
                        <option value="Bendahara">Bendahara</option>
                    </select><br> -->

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