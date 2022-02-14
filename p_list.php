<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>P_List</title>

    <link rel="icon" href="asset/img/favicon.png" type="image/x-icon" />

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/navbar.css" rel="stylesheet">

    <link href="asset/indexs.css" rel="stylesheet">

</head>

<body background="asset/img/sunset.jpg">

<div class="container">
<div class="container">

  <?php include "navbar.php"; ?>   

  <div class="panel panel-info col-md-12">

      <?php

        include "koneksi.php";

        error_reporting(0);

        $kode=$_GET['kode'];

        // $query=mysql_query("SELECT * FROM aduan");

          $query=mysqli_query($konek, "SELECT pelapor.*, aduan.* FROM pelapor, aduan WHERE pelapor.np=aduan.np;");

        while($row=mysqli_fetch_array($query))

        {

      ?>

          <div class="panel panel-warning col-md-4">

            <p class="text-danger"><b>No : <?php echo $row['kode']; ?></b><br></p><hr>
<p  ><font color="red"><b>Kategori</b>     : <?php echo $row['kategori'];?></font></p>  
 <p  ><font color="purple"><b>Tanggal</b>      : <?php echo $row['datetime'];?></font></p>
            <p><b>Nama Pelapor</b> : <?php echo $row['nama']; ?><br></p>

            <p><b>Alamat</b> : <?php echo $row['alamat']; ?><br></p>

            <p><b>No Hp</b> : <?php echo $row['nohp']; ?><br></p>

            <p><b>Uraian</b> : <?php echo $row['isi']; ?><br></p>

            <p><b>Tkp</b> : <?php echo $row['tkp']; ?></p><br>
 

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