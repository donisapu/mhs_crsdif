<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login Santri</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url()?>aset/admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?= base_url()?>aset/admin/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?= base_url()?>aset/admin/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?= base_url()?>aset/admin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-8">
            
                    <h1 class="page-header">Selamat Datang</h1>
                    <h3>Pada Sistem Keuangan Pesantren</h3>
                <!-- /.col-lg-12 -->
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            Menenai Sistem Keuangan Pesantren
                        </div>
                        <div class="panel-body">
                            <img width="100%" src="<?= base_url()?>aset/pesantren.jpg" alt=""><hr>
                            <p>Sistem keuangan pesantren dibuat untuk memberikan kemudahan pengelolaan uang bangunan, uang bulanan yang dibayarkan oleh santri, selain itu sistem ini mendukung penggelolaan pengeluaran keuangan sehingga catatan keuangan pada pesantren akan lebih valid dan efesien.</p>
                        </div>
                        <div class="panel-footer">
                            sistem_keuangan_pesantren_evie &copy 2021
                        </div>
                    </div>
            
            </div>
            <div class="col-md-4">
                <div class="login-panel panel panel-default">
                    <h3 style="padding-left: 10px">Login Santri</h3>
                    <div class="panel-heading">
                        <h3 class="panel-title">Silakan Login !</h3>
                    </div>
                    <div class="panel-body">
                        <span>Login menggunakan username dan password yang telah diberikan oleh admin</span><hr>
                        <form action="<?= site_url('login_santri/aksi')?>" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" type="text" required autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="" required>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <div class="form-group">
                                    <?= $this->session->flashdata('gagal')?>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" class="btn btn-lg btn-primary btn-block">Login</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="<?= base_url()?>aset/admin/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?= base_url()?>aset/admin/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?= base_url()?>aset/admin/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?= base_url()?>aset/admin/dist/js/sb-admin-2.js"></script>

</body>

</html>
