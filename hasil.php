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
<body style="background-image: url('asset/img/polri.jpg'); height: 100%; background-position: center; background-repeat: no-repeat; background-size: cover;">

 <br>
  <div>
    <?php include"navbar.php"; ?>
  </div>

  <div class="col-md-12">
  <div class="col-md-2">
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
                  $query = mysqli_query($konek , "SELECT * FROM aduan");
                  $jumlah = mysqli_num_rows($query);

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

  <div class="col-md-10">
    <!--div class="well well-sm">
      <caption><p align="center"><b>Kategori</b></p></caption>
      <div class="panel panel-info">
        <div class="table-responsive">
          <table class="table table-hover">
            <tr class="">
              <td class="info" width="35%">kekerasan Fisik</td>
              <td class="warning" width="15%">
                <?php
                  include "koneksi.php";
                  $query = mysqli_query($konek, "SELECT * FROM aduan WHERE kategori='Kekerasan Fisik'");
                  $jumlah = mysqli_num_rows($query);

                  echo "$jumlah";
                ?>
              </td>
              <td class="info" width="35%">Kekerasan Psikis</td>
              <td class="warning" width="15%">
                <?php
                  include "koneksi.php";
                  $query = mysqli_query($konek, "SELECT * FROM aduan WHERE kategori='Kekerasan Psikis'");
                  $jumlah = mysqli_num_rows($query);

                  echo "$jumlah";
                ?>
              </td>
            </tr>
            <tr class="">
              <td class="info">Pelecehan Seksual</td>
              <td class="warning">
                <?php
                  include "koneksi.php";
                  $query = mysqli_query($konek, "SELECT * FROM aduan WHERE kategori='Pelecehan Seksual'");
                  $jumlah = mysqli_num_rows($query);

                  echo "$jumlah";
                ?>
              </td>
              <td class="info">Pencurian</td>
              <td class="warning">
                <?php
                  include "koneksi.php";
                  $query = mysqli_query($konek, "SELECT * FROM aduan WHERE kategori='Pencurian'");
                  $jumlah = mysqli_num_rows($query);

                  echo "$jumlah";
                ?>
              </td>
            </tr>
            <tr class="">
              <td class="info">Pembunuhan</td>
              <td class="warning">
                <?php
                  include "koneksi.php";
                  $query = mysqli_query($konek, "SELECT * FROM aduan WHERE kategori='Pembunuhan'");
                  $jumlah = mysqli_num_rows($query);

                  echo "$jumlah";
                ?>
              </td>
              <td class="info">Kdrt</td>
              <td class="warning">
                <?php
                  include "koneksi.php";
                  $query = mysqli_query($konek, "SELECT * FROM aduan WHERE kategori='Kdrt'");
                  $jumlah = mysqli_num_rows($query);

                  echo "$jumlah";
                ?>
              </td>
            </tr>
            <tr class="">
              <td class="info">Lainya</td>
              <td class="warning">
                <?php
                  include "koneksi.php";
                  $query = mysqli_query($konek, "SELECT * FROM aduan WHERE kategori='Lainya'");
                  $jumlah = mysqli_num_rows($query);

                  echo "$jumlah";
                ?>
              </td>
              <td class="danger">Total Kasus</td>
              <td class="danger">
                
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div-->
    <div class="card mb-4 well well-sm">
      <div class="card-header">
        <i class="fas fa-chart-bar me-1"></i>
          Kategori
        </div>
        <div class="card-body"><canvas id="barKategory" width="100%" height="40"></canvas></div>
    </div>
  </div>
  </div> 

  <?php
    include "koneksi.php";
    $query = mysqli_query($konek, "SELECT * FROM aduan");
    $query2 = mysqli_query($konek, "SELECT * FROM aduan WHERE kategori='Kekerasan Fisik'");
    $query3 = mysqli_query($konek, "SELECT * FROM aduan WHERE kategori='Pelecehan Seksual'");
    $query4 = mysqli_query($konek, "SELECT * FROM aduan WHERE kategori='Pembunuhan'");
    $query5 = mysqli_query($konek, "SELECT * FROM aduan WHERE kategori='Kekerasan Psikis'");
    $query6 = mysqli_query($konek, "SELECT * FROM aduan WHERE kategori='Pencurian'");
    $query7 = mysqli_query($konek, "SELECT * FROM aduan WHERE kategori='Kdrt'");
    $query8 = mysqli_query($konek, "SELECT * FROM aduan WHERE kategori='Lainya'");

    $total = mysqli_num_rows($query);
    $kfisik = mysqli_num_rows($query2);
    $psek = mysqli_num_rows($query3);
    $pembunuh = mysqli_num_rows($query4);
    $kpsikis = mysqli_num_rows($query5);
    $curi = mysqli_num_rows($query6);
    $kdrt = mysqli_num_rows($query7);
    $lainnya = mysqli_num_rows($query8);

  ?>

 

 
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="assets/demo/chart-pie-demo.js"></script>

    
        <script>
      var ctx = document.getElementById("barKategory");
      var myLineChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: ["Kekerasan Fisik", "Pelecehan Seksual", "Pembunuhan", "Kekerasan Psikis", "Pencurian", "KDRT","Lainnya"],
          datasets: [{
            label: "Kasus",
            backgroundColor: ['#07C217', '#0E3AD1', '#FDB45C', '#46BFBD', '#949FB1','#4D5360','#F7464A'],
            borderColor: "rgba(2,117,216,1)",
            data: [
              <?php echo $kfisik ?>,
              <?php echo $psek ?>,
              <?php echo $pembunuh ?>,
              <?php echo $kpsikis ?>,
              <?php echo $curi ?>,              
              <?php echo $kdrt ?>,
              <?php echo $lainnya ?>
            ],
          }],
        },
        options: {
          scales: {
            xAxes: [{
              time: {
                unit: 'kasus'
              },
              gridLines: {
                display: false
              },
              ticks: {
                maxTicksLimit: 7
              }
            }],
            yAxes: [{
              ticks: {
                min: 0,
                max: <?php echo $total ?>,
                maxTicksLimit: 5
              },
              gridLines: {
                display: true
              }
            }],
          },
          legend: {
            display: false
          }
        }
      });
    </script>
</body>    
</html>