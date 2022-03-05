<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Home</title>

    <link rel="icon" href="asset/img/favicon.png" type="image/x-icon" />

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/navbar.css" rel="stylesheet">

</head>

<body style="background-image: url('asset/img/polri.jpg'); height: 100%; background-position: center; background-repeat: no-repeat; background-size: cover;">

<div class="container">

 <?php include "navbar.php"; ?>    

  <div class="panel panel-info">

      <?php

        include "koneksi.php";

        error_reporting(0);

        $kode=$_GET['kode'];

        $query=mysqli_query($konek, "SELECT pelapor.*, aduan.* FROM pelapor, aduan WHERE pelapor.np=aduan.np;");

        while($row=mysqli_fetch_array($query))

        {

      ?>

            <div>

              <div class="text-left">

                <div class="panel panel-info">

                  <div class="panel-body">

                    <div class="table-responsive">

                    <table class="table table-condensed table-hover">    

                      <tr>

                        <td rowspan="4" class="info"><p class="col-md-1"><h4><?php echo $row['kode'];?></h4></p></td>

                      </tr>

                      <tr>

                        <td class="active">      

                          <p class="col-md-3"><font color="red"><b>Kategori</b>     : <?php echo $row['kategori'];?></font></p>    

                          <p class="col-md-3"><font color="purple"><b>Tanggal</b>      : <?php echo $row['datetime'];?></font></p>

                          <p class="col-md-4"><font color="blue"><b>Info Hubungi</b> : <?php echo $row['nohp'];?></font></p>

                        </td>

                      </tr>

                      <tr>

                        <td class="active">

                          <p class="col-md-3"><b>Nama Pelapor</b> : <?php echo $row['nama'];?></p>    

                          <p class="col-md-3"><b>Jenis Kelamin</b>: <?php echo $row['jk'];?></p>

                          <p class="col-md-4"><b>Tkp</b>          : <?php echo $row['tkp'];?></p>

                        </td>

                      </tr>

                      <tr class="active">

                        <td colspan="3" class="">

                          <div class="row"><p></p>

                            <div class="col-lg-12 text-left">

                              <div class="panel panel-info">

                                <div class="panel-body">

                                  <p align="Left"><b>Uraian Kasus Kriminalitas</b></p>

                                  <?php echo $row['isi']; ?>

                                </div>

                              </div>

                            </div>

                          </div>

                        </td>

                      </tr> 

                    </table>

                    </div>

                  </div>

                </div>

              </div>

            </div>

          <?php

            }

          ?>

    </div>

 

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script src="js/bootstrap.min.js"></script>   

</div>    

</body>

</html>