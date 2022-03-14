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

				include("koneksi.php");

				$username = $_POST['username'];

				$pass = $_POST['password'];

				$cekuser = mysqli_query($konek, "SELECT * FROM pelapor WHERE username = '$username'");

				$jumlah = mysqli_num_rows($cekuser);

				$hasil = mysqli_fetch_array($cekuser);

				if($jumlah == 0) {

   				echo "<h2>Username salah !...</h2>";

   				echo '<a href="loginuser.php"><span class="glyphicon glyphicon-repeat"></span></a>';

				} else {

   				if($pass <> $hasil['password']) {

    				 echo "<h2>Password Salah!...</h2>";

    				 echo '<a href="loginuser.php"><span class="glyphicon glyphicon-repeat"></span></a>';

   				} else {

    				 $_SESSION['username'] = $hasil['username'];
					 
    				 $_SESSION['np'] = $hasil['np'];

     				header('location:user.php');

  				 }

				}

			?>	          

</center>       

  </body>

</html>







