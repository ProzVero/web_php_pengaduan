<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Analisa</title>
  <link rel="icon" href="asset/img/favicon.png" type="image/x-icon" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="admin/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="admin/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <link href="admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
    <link href="admin/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
    <link href="admin/dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="admin/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>
<body background="asset/img/sunset.jpg">
 <br>
  <div class="col-md-12">
    <?php include"navbar.php"; ?>
  </div>

  <div class="col-md-9">
  <div class="col-md-3">
    <div class="well well-sm">
      <caption><p align="center"><b>Jumlah Kasus</b></p></caption>
      <div class="panel panel-info">
        <div class="table-responsive">
          <table class="table">
            <tr class="info">
              <td><span class="glyphicon glyphicon-eye-open"></span> Via Dekstop</td>
              <td>
                <?php
                  include "koneksi.php";
                  $query = mysql_query("SELECT * FROM aduan");
                  $jumlah = mysql_num_rows($query);

                  echo "$jumlah";
                ?>
              </td>
            </tr>
            <tr  class="info">
              <td><span class="glyphicon glyphicon-phone"></span> Via Smarthphone</td>
              <td>
                <?php
                  include "koneksi.php";
                  $query = mysql_query("SELECT * FROM aduan");
                  $jumlah = mysql_num_rows($query);

                  echo "$jumlah";
                ?>
              </td>
            </tr>
          </table>
          <br><br><br><br>
        </div>
      </div>
    </div>


    <div class="well well-sm">
      <caption><p align="center"><b>Visitor</b></p></caption>
      <div class="panel panel-danger">
        <div class="table-responsive">
          <table class="table">
            <tr class="warning">
              <td><span class="glyphicon glyphicon-user"></span> Jumlah User</td>
              <td>
                <?php
                  include "koneksi.php";
                  $query = mysql_query("SELECT * FROM pelapor");
                  $jumlah = mysql_num_rows($query);

                  echo "$jumlah";
                ?>
              </td>
            </tr>
            <tr  class="warning">
              <td><span class="glyphicon glyphicon-user"></span> Jumlah Pengunjung</td>
              <td>0</td>
            </tr>
          </table>
        </div>
      </div>
    </div>
 

  </div>

  <div class="col-md-6">
    <div class="well well-sm">
      <caption><p align="center"><b>Kategori</b></p></caption>
      <div class="panel panel-info">
        <div class="table-responsive">
          <table class="table table-hover">
            <tr class="">
              <td class="info" width="35%">kekerasan Fisik</td>
              <td class="warning" width="15%">
                <?php
                  include "koneksi.php";
                  $query = mysql_query("SELECT * FROM aduan WHERE kategori='Kekerasan Fisik'");
                  $jumlah = mysql_num_rows($query);

                  echo "$jumlah";
                ?>
              </td>
              <td class="info" width="35%">Kekerasan Psikis</td>
              <td class="warning" width="15%">
                <?php
                  include "koneksi.php";
                  $query = mysql_query("SELECT * FROM aduan WHERE kategori='Kekerasan Psikis'");
                  $jumlah = mysql_num_rows($query);

                  echo "$jumlah";
                ?>
              </td>
            </tr>
            <tr class="">
              <td class="info">Pelecehan Seksual</td>
              <td class="warning">
                <?php
                  include "koneksi.php";
                  $query = mysql_query("SELECT * FROM aduan WHERE kategori='Pelecehan Seksual'");
                  $jumlah = mysql_num_rows($query);

                  echo "$jumlah";
                ?>
              </td>
              <td class="info">Pencurian</td>
              <td class="warning">
                <?php
                  include "koneksi.php";
                  $query = mysql_query("SELECT * FROM aduan WHERE kategori='Pencurian'");
                  $jumlah = mysql_num_rows($query);

                  echo "$jumlah";
                ?>
              </td>
            </tr>
            <tr class="">
              <td class="info">Pembunuhan</td>
              <td class="warning">
                <?php
                  include "koneksi.php";
                  $query = mysql_query("SELECT * FROM aduan WHERE kategori='Pembunuhan'");
                  $jumlah = mysql_num_rows($query);

                  echo "$jumlah";
                ?>
              </td>
              <td class="info">Kdrt</td>
              <td class="warning">
                <?php
                  include "koneksi.php";
                  $query = mysql_query("SELECT * FROM aduan WHERE kategori='Kdrt'");
                  $jumlah = mysql_num_rows($query);

                  echo "$jumlah";
                ?>
              </td>
            </tr>
            <tr class="">
              <td class="info">Lainya</td>
              <td class="warning">
                <?php
                  include "koneksi.php";
                  $query = mysql_query("SELECT * FROM aduan WHERE kategori='Lainya'");
                  $jumlah = mysql_num_rows($query);

                  echo "$jumlah";
                ?>
              </td>
              <td class="danger">Total Kasus</td>
              <td class="danger">
                <?php
                  include "koneksi.php";
                  $query = mysql_query("SELECT * FROM aduan");
                  $jumlah = mysql_num_rows($query);

                  echo "$jumlah";
                ?>
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
  </div> 

   

 
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