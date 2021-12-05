<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Data Mahasiswa</h1>
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
                            
                            <a class="btn btn-success" href="<?= site_url('admin/tambah_mahasiswa')?>"><i class="fa fa-plus"></i> Tambah</a>
                            
                        </div>

                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>SN</th>
                                        <th>NIM</th>
                                        <th>Nama</th>
                                        <th>Tgl Lahir</th>
                                        <th>Gender</th>
                                        <th>Alamat</th>
                                        <th>Telp</th>
                                        <th>Status</th>
                                        <th>#</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach ($mahasiswa as $key): ?>
                                        
                                    <tr class="odd gradeX">
                                        <td><?= $no++?></td>
                                        <td><?= $key->rfid_uid?></td>
                                        <td><?= $key->nim?></td>
                                        <td><?= $key->name?></td>
                                        <td><?= $key->tgl_lahir?></td>
                                        <td><?= $key->jenis_kelamin?></td>
                                        <td><?= $key->alamat?></td>
                                        <td><?= $key->no_telp?></td>
                                        <td><?= $key->status_mhs?></td>
                                        <td>
                                            <?php if($key->status_mhs=='tidak'){ ?>
                                                <a href="<?= site_url('admin/aktifkan_mahasiswa/'.$key->id)?>" class="btn btn-info btn-sm">Aktifkan</a>
                                            <?php }else{?>
                                                <a href="<?= site_url('admin/nonaktifkan_mahasiswa/'.$key->id)?>" class="btn btn-danger btn-sm">Nonaktifkan</a>
                                            <?php } ?>
                                        </td>
                                        <td class="center" width="20%">
                                        <a class="btn btn-success btn-sm" href="<?= site_url('admin/edit_mahasiswa/'.$key->id)?>"><i class="fa fa-edit"></i> Edit</a>
                                        <a class="btn btn-danger btn-sm" href="<?= site_url('admin/hapus_mahasiswa/'.$key->id)?>" onclick="return confirm('Yakin Hapus Data?')"><i class="fa fa-trash"></i> Hapus</a>
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

       