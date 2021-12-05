<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistem Keuangan</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url()?>aset/admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?= base_url()?>aset/admin/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?= base_url()?>aset/admin/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?= base_url()?>aset/admin/vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="<?= base_url()?>aset/admin/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="<?= base_url()?>aset/admin/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    
    <!-- Custom Fonts -->
    <link href="<?= base_url()?>aset/admin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <script type="text/javascript">
    function PreviewImage() {
      var oFReader = new FileReader();
      oFReader.readAsDataURL(document.getElementById("upload").files[0]);

      oFReader.onload = function (oFREvent)
      {
        document.getElementById("uploadPreview").src = oFREvent.target.result;
      };
    };
    
    function PreviewImage1() {
      var oFReader = new FileReader();
      oFReader.readAsDataURL(document.getElementById("upload1").files[0]);

      oFReader.onload = function (oFREvent)
      {
        document.getElementById("uploadPreview1").src = oFREvent.target.result;
      };
    };
    </script>

    <script type="text/javascript">
      function check() {
    var x = document.getElementById("pwd");
    var x1 = document.getElementById("pwd1");


    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
    if (x1.type === "password") {
      x1.type = "text";
    } else {
      x1.type = "password";
    }
    }
    </script>
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Keuangan Pesantren</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                
             
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <?= $this->session->nama_santri?> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?= site_url('santri/gantipassword')?>"><i class="fa fa-user fa-fw"></i> Ganti Password</a>
                        </li>
                        <!-- <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li> -->
                        <li class="divider"></li>
                        <li><a href="<?= site_url('login_santri/logout')?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <i class="fa fa-user" style="font-size: 35px"></i> Santri, <?= $this->session->nama_santri?>
                                
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="<?= site_url('santri')?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="<?= site_url('santri/biodata/'.$this->session->id_santri)?>"><i class="fa fa-edit fa-fw"></i> Biodata</a>
                        </li>
                        <li>
                            <a href="<?= site_url('santri/pembayaran_bangunan')?>"><i class="fa fa-list fa-fw"></i> Pembayaran Bangunan</a>
                        </li>
                        <li>
                            <a href="<?= site_url('santri/detail_pembayaran_bulanan/'.$this->session->id_santri)?>"><i class="fa fa-list fa-fw"></i> Pembayaran Bulanan</a>
                        </li>
                       
                       
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>