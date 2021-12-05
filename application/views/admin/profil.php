<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Form Ganti Password</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Ganti Password
                        </div>
                        <div class="panel-body">
                            <?= $this->session->flashdata('success')?>
                            <div class="row">
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-12">
                                    <?= $this->session->flashdata('berhasil')?>    
                                    <form action="<?php echo base_url().'admin/ganti_password_act/'.$this->session->userdata('id_admin'); ?>" method="post">
                                          <div class="form-group">
                                            <label>Password Baru</label>
                                            <input id="pwd" class="form-control" type="password" name="pass_baru">
                                            <?php echo form_error('pass_baru'); ?>
                                          </div>

                                          <div class="form-group">
                                            <label>Ulangi Password Baru</label>
                                            <input id="pwd1" class="form-control" type="password" name="ulang_pass">
                                            <?php echo form_error('ulang_pass'); ?>
                                          </div>
                                          <input type="checkbox" onclick="check()"> Lihat Password<br><br>
                                          <div class="form-group">
                                            <input class="btn btn-primary btn-sm btn-block" type="submit" value="Update">
                                          </div>
                                    </form>
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