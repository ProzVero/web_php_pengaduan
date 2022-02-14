<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <link rel="icon" href="asset/img/favicon.png" type="image/x-icon" />
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
 <div class="container">
    <?php include"navbar.php"; ?>
  <div class="panel panel-info col-md-9">
          <br>
      <div class="table-responsive">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                          <h5><b>Informasi</b></h5>
                        </div>
                        <!-- /.panel-heading -->
                        
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr class="info">
                                            <th>Judul</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    error_reporting(0);
                                    include "koneksi.php";
                                    $no=$_GET['no'];
                                    $query=mysqli_query($konek, "select * from himbauan");
                                    while($d=mysqli_fetch_array($query))
                                        {

                                    ?>
                                        <tr>
                                            <td class="warning"><?php echo $d['judul']; ?></td>
                                            <td>
                                              <p class="text-muted" align="right">On :<?php echo $d['datetime']; ?></p>
                                              <?php echo $d['ket']; ?>
                                            </td>
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
 
 

  <div class="col-md-3">
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
                  $query = mysqli_query($konek, "SELECT * FROM pelapor");
                  $jumlah = mysqli_num_rows($query);

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
<?php 
  include'footer.php';
 ?>
</div>
<!--   <div class="col-md-12">
  <div class="panel"></div>  
    <div class="panel panel-default">
      <p></p>
      <p>&nbsp&nbsp <b>Resticted</b><i> Created by </i>Muhammad Ridwan Mahfudz</p>  
    </div>
  </div>	 -->
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
