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

<body style="background-image: url('asset/img/polri.jpg'); height: 100%; background-position: center; background-repeat: no-repeat; background-size: cover;">


    <!-- Container -->

    <div>

        <?php include "navbar.php"; ?>

    </div>
    <div class="container">

    <?php

        if(!isset($_SESSION['username'])) {

        header('location:loginuser.php'); }

        else { $username = $_SESSION['username']; }

        require_once("koneksi.php");

            

        $query = mysqli_query($konek, "SELECT * FROM pelapor WHERE username = '$username'");

        $hasil = mysqli_fetch_array($query);

    ?>


    <div class="col-md-3">

        <?php include "usermenu.php"; ?>

    </div>

        



    <div class="col-md-9">  

        <div class="panel-panel-info">  

        <div class="table-responsive">

            <table class="table tabel-condensed">

            <?php

                include "koneksi.php";



                $query=mysqli_query($konek, "select * from pelapor where username='$username'");

                while($d=mysqli_fetch_array($query))

                {

            ?>

                <tr class="info" align="center">

                    <td colspan="2"><p><b>IDENTITAS ANDA</b></p></td>

                </tr>

                <tr class="active">

                    <td><p><b>No User</b></p></td> <td>: <?php echo $d['np']; ?></td>

                </tr>  
                <tr class="active">

                    <td><p><b>Username</b></p></td> <td>: <?php echo $d['username']; ?></td>

                </tr>    
                <tr class="active">

                    <td><p><b>Nama</b></p></td><td>: <?php echo $d['nama']; ?></td>

                </tr>   
                <tr class="active">

                    <td><p><b>Tempat tanggal lahir</b></p></td><td>: <?php echo $d['ttl']; ?></td>

                </tr>   
                <tr class="active">

                    <td><p><b>Jenis kelamin</b></p></td><td>: <?php echo $d['jk']; ?></td>

                </tr>   
                <tr class="active">

                    <td><p><b>Alamat</b></p></td><td>: <?php echo $d['alamat']; ?></td>

                </tr>   
                <tr class="active">

                    <td><p><b>Pekerjaan</b></p></td><td>: <?php echo $d['pekerjaan']; ?></td>

                </tr>   
                <tr class="active">

                    <td><p><b>No Handphone</b></p></td><td>: <?php echo $d['nohp']; ?></td>

                </tr>     
                <tr class="active">

                    <td><p><b>Foto</b></p></td>
                    <td>: <img src="asset/img/pelapor/<?php echo $d['gambar'] ?>" style="width: 75px; height: 75px">
              </td>

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

