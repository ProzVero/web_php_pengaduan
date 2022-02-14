<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Action</title>
    <link rel="icon" href="asset/img/favicon.png" type="image/x-icon" />
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="asset/login.css" rel="stylesheet">
  </head>
  <body>
<center>
			<?php
				session_start();
				require_once("koneksi.php");
				$adminname = $_POST['adminname'];
				$pass = $_POST['password'];
				$cekadmin = mysql_query("SELECT * FROM admin WHERE adminname = '$adminname'");
				$jumlah = mysql_num_rows($cekadmin);
				$hasil = mysql_fetch_array($cekadmin);
				if($jumlah == 0) {
   				echo "<h2>Adminname salah !...</h2>";
   				echo '<a href="loginadmin.php"><span class="glyphicon glyphicon-repeat"></span></a>';
				} else {
   				if($pass <> $hasil['password']) {
    				 echo "<h2>Password Salah!...</h2>";
    				 echo '<a href="loginadmin.php"><span class="glyphicon glyphicon-repeat"></span></a>';
   				} else {
    				 $_SESSION['adminname'] = $hasil['adminname'];
     				header('location:admin.php');
  				 }
				}
			?>	          
</center>       
  </body>
</html>


