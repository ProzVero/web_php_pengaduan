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
 <?php include "navbar.php"; ?>    
  <div class="panel panel-info">
      <?php
        include "koneksi.php";
        error_reporting(0);
        $kode=$_GET['kode'];
        // $query=mysql_query("SELECT * FROM aduan");
          $query=mysql_query("SELECT pelapor.*, aduan.* FROM pelapor, aduan WHERE pelapor.np=aduan.np;");
        while($row=mysql_fetch_array($query))
        {
      ?>
          <div class="panel panel-warning col-md-4">
            <p class="text-danger"><b>No : <?php echo $row['kode']; ?></b><br></p><hr>
            <p><b>Nama</b> : <?php echo $row['nama']; ?><br></p>
            <p><b>Alamat</b> : <?php echo $row['alamat']; ?><br></p>
            <p><b>No Hp</b> : <?php echo $row['nohp']; ?><br></p><hr>
            <p><b>Uraian</b> : <?php echo $row['uraian']; ?><br></p>
            <p><b>Tkp</b> : <?php echo $row['tkp']; ?><br></p>
            <p class="text-danger"><b>Jumlah Pelaku</b> : <?php echo $row['jmlpelaku']; ?><br></p>
            <p class="text-danger"><b>Jumalah Korban</b> : <?php echo $row['jmlkorban']; ?><br></p>
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