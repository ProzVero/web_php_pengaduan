<?php

// definisikan koneksi ke database

$server = "localhost";

$username = "root";

$password = "";

$database = "db_pengaduan";

 

// Koneksi dan memilih database di server

mysqli_connect($server,$username,$password,$database) or die("Koneksi gagal");

//mysql_select_db($database) or die("Database tidak bisa dibuka");



?>

