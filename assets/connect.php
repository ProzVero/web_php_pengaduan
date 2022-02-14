<?php
// definisikan koneksi ke database
$server = "sql304.epizy.com";
$username = "epiz_30566725";
$password = "xSmpWtgLff";
$database = "epiz_30566725_pengaduan";
 
// Koneksi dan memilih database di server
mysql_connect($server,$username,$password) or die("Koneksi gagal");
mysql_select_db($database) or die("Database tidak bisa dibuka");

?>
