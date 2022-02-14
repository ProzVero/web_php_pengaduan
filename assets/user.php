<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Page</title>
    <link rel="icon" href="asset/img/favicon.png" type="image/x-icon" />
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/navbar.css" rel="stylesheet">
    <script type="text/javascript" src="asset/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="asset/ckeditor/style.js"></script>
</head>
<body background="asset/img/sunset.jpg">
    <!-- Container -->
    <div class="container">
    <?php
        session_start();
        if(!isset($_SESSION['username'])) {
        header('location:loginuser.php'); }
        else { $username = $_SESSION['username']; }
        require_once("koneksi.php");
            
        $query = mysql_query("SELECT * FROM pelapor WHERE username = '$username'");
        $hasil = mysql_fetch_array($query);
    ?>
        
        <div class="col-md-12">
            <?php include "navbar.php"; ?>
        </div>
        <div class="col-md-3">
            <?php include "usermenu.php"; ?>
        </div>
        

    <div class="col-md-9">  
        <div class="panel-panel-info">  
        <div class="table-responsive">
            <table class="table tabel-condensed">
            <?php
                include "koneksi.php";

                $query=mysql_query("select * from pelapor where username='$username'");
                while($d=mysql_fetch_array($query))
                {
            ?>
                <tr class="info" align="center">
                    <td colspan="3"><p><b>IDENTITAS ANDA</b></p></td>
                </tr>
                <tr class="active">
                    <td><p class="text-danger">No User  :<?php echo $d['np']; ?></p></td>
                    <td><p class="text-danger">Username :<?php echo $d['username']; ?></p></td>
                    <td><p class="text-danger">Password :<?php echo $d['password']; ?></p></td>
                </tr>
                <tr class="active">
                    <td><p>Nama          :<?php echo $d['nama']; ?></p></td>
                    <td><p>Ttl           :<?php echo $d['ttl']; ?></p></td>
                    <td><p>Jenis Kelamin :<?php echo $d['jk']; ?></p></td>
                </tr>
                <tr class="active">
                    <td><p>Alamat       :<?php echo $d['alamat']; ?></p></td>
                    <td><p>Pekerjaan    :<?php echo $d['pekerjaan']; ?></p></td>
                    <td><p>No Handphone :<?php echo $d['nohp']; ?></p></td>
                </tr>                       
            <?php 
                } 
            ?>
            </table>
        </div>
        </div>
    </div>

    <!-- <div class="col-md-9">
        <div class="panel panel-danger">
            <div class="panel-heading">Keterangan</div>
            <div class="panel-body">
                <p>Panel <b>Slide Contents</b> digunakan untuk logout atau untuk menyampampaikan laporan
                mengenai peristiwa yang terjadi disekitar anda, khususnya yang menyangkut masalah 
                keamanan</p>

                <p><b>User Link</b> memuat link "Keluar" dan "User Profile" yang bisa digunakan jika anda
                ingin meninggalkan halaman User</p>

                <p><b>Forms Lists</b> memuat link "pengaduan online" yang bisa anda gunakan untuk</p>
            </div>
            <br>
        </div>
    </div>    --> 
    
    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>     
    </div>  
    <!-- Container -->
</body>
</html>
