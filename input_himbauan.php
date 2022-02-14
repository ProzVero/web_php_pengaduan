<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="admin/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="admin/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <link href="admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
    <link href="admin/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
    <link href="admin/dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="admin/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="asset/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="asset/ckeditor/style.js"></script>
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
        <div class="panel panel-info col-md-12">
            <br>
            <div class="table-responsive">
                <form action="" method="post">
                <table class="table table-hover table-bordered">
                    <tr class="info">
                        <td colspan="2"><h5><p align="center"><b>FORM INPUT HIMBAUAN</b></p></h5></td>
                    </tr>
                    <tr>
                        <td>Judul</td>
                        <td><input class="form-control" type="text" name="judul" value="" placeholder="Username..." maxlength="30" size="70px"></td>
                    </tr>
                    <tr>
                        <td>Keterangan</td>
                        <td><textarea class="ckeditor" name="ket"></textarea></td>
                    </tr>
                    <tr>
                <td colspan="2" align="center">
                    <input class="btn btn-warning" type="reset" name="batal" value="BATAL" />
                    <input class="btn btn-info" type="submit" name="simpan" value="SIMPAN" />
                </td>
                </tr>
                <tr>
                <td colspan="2" align="center">
                  <?php
                  error_reporting(0);
                  require_once(koneksi.php);
                  $judul=$_POST['judul'];
                  $ket=$_POST['ket'];
                  $simpan=$_POST['simpan'];
              

                  if (isset($simpan))
                  {

                  if ($judul=='')
                  {
                  echo "Judul belum diisi !!!...";
                  }
                  else if ($ket=='')
                  {
                  echo "Keterangan belum diisi !!!...";
                  }
                  else 
                  {
                  $query1="insert into himbauan (judul,ket) 
                  values ('$judul','$ket')";
                  mysqli_query($konek, $query1) or die ('Gagal Query');

                  echo "Data berhasih ditambahkan...";
                  }
                  }
                  ?>      
                </td>
              </tr>
                </table>
            </div>
            </form>
        </div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/bootstrap.min.js"></script>
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
