<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin</title>
    <link href="admin/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="admin/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <link href="admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
    <link href="admin/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
    <link href="admin/dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="admin/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <style type="text/css">
    @media (max-width: 680px) {
        .navbar-top-links .dropdown-user {
  right: 0;
  left: 10px;
}
    }
    </style>
</head>

<body>
    <?php
        session_start();
        if(!isset($_SESSION['adminname'])) {
        header('location:loginadmin.php'); }
        else { $adminname = $_SESSION['adminname']; }
        require_once("koneksi.php");
            
        $query = mysqli_query($konek, "SELECT * FROM admin WHERE adminname = '$adminname'");
        $hasil = mysqli_fetch_array($query);
    ?>
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
                <a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-th-large"></span> Halaman Depan</a>
                <a class="navbar-brand" href="admin.php"><span class="glyphicon glyphicon-cog"></span> Halaman Admin</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><b><?php echo "$adminname"; ?></b>
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                       
                        <li class="divider"></li>
                        <li><a href="logoutadmin.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <?php include "adminmenu.php"; ?>
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Data Tabel Pelapor</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="table-responsive">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            DataTables Advanced Tables
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr class="success">
                                            <th>No Pelapor</th>
                                            <th>Nama Pelapor</th>
                                            <th>NIK Pelapor</th>
                                            <th>Tempat Tanggal Lahir</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Alamat</th>
                                            <th>Pekerjaan</th>
                                            <th>Nomor Handphone</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Foto</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php

                                    error_reporting(0);
                                    include "koneksi.php";

                                    $np=$_GET['np'];
                                    $query=mysqli_query($konek, "select * from pelapor");
                                    while($d=mysqli_fetch_array($query))
                                        {

                                    ?>
                                        <tr>
                                            <td><?php echo $d['np']; ?></td>
                                            <td><?php echo $d['nama']; ?></td>
                                            <td><?php echo $d['nik']; ?></td>
                                            <td><?php echo $d['ttl']; ?></td>
                                            <td><?php echo $d['jk']; ?></td>
                                            <td><?php echo $d['alamat']; ?></td>
                                            <td><?php echo $d['pekerjaan']; ?></td>
                                            <td><?php echo $d['nohp']; ?></td>
                                            <td><?php echo $d['username']; ?></td>
                                            <td><?php echo $d['password']; ?></td>
                                            <td><img src="asset/img/pelapor/<?php echo $d['gambar'] ?>" style="width: 75px; height: 75px"></td>
                                            <td> 
                                                <a Onclick="return confirm('Yakin Mau Hapus?...');"href="hapus_pelapor.php?np=<?php echo $d['np']; ?>">
                                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                                </a>
                                            </th>
                                        </tr>
                                    <?php
                                        }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            </div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="admin/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="admin/bower_components/metisMenu/dist/metisMenu.min.js"></script>
    <script src="admin/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    <script src="admin/dist/js/sb-admin-2.js"></script>
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>
</body>
</html>
