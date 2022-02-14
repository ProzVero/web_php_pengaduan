<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Form Pengaduan</title>

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

            

        $query = mysqli_query($konek, "SELECT * FROM pelapor WHERE username = '$username'");

        $hasil = mysqli_fetch_array($query);

    ?>



        <div class="col-md-12">

            <?php include "navbar.php"; ?>

        </div>

        <div class="col-md-3">

            <?php include "usermenu.php"; ?>

        </div>



    <div class="col-md-9">

        <div class="panel panel-info col-md-12">

        <br>

            <div class="table table-responsive">

            <form action="" method="post" enctype="multipart/form-data">   

                <?php

                    include "koneksi.php";



                    $query=mysqli_query($konek,"select * from pelapor where username='$username'");

                    while($d=mysqli_fetch_array($query))

                    {

                ?>



                <table class="table table-hover table-bordered">

                    <tr class="info">

                        <td colspan="2"><h5><p align="center"><b>FORM DATA ADUAN</b></p></h5></td>

                    </tr>

                    <tr>

                        <td>No Pelapor</td>

                        <td><input class="form-control" type="text" name="np" value="<?php echo $d['np'];?>" placeholder="" size="100px"></td>

                    </tr>

                    <tr>

                        <td>Kategori</td>

                        <td>

                            <input type="radio" name="kategori" value="Kekerasan Fisik"> Kekerasan Fisik

                            <input type="radio" name="kategori" value="Kekerasan Psikis"> Kekerasan Psikis

                            <input type="radio" name="kategori" value="Pelecehan Seksual"> Pelecehan Seksual <br>

                            <input type="radio" name="kategori" value="Pencurian"> Pencurian

                            <input type="radio" name="kategori" value="Pembunuhan"> Pembunuhan

                            <input type="radio" name="kategori" value="Kdrt"> Kdrt <br>

                            <input type="radio" name="kategori" value="Lainya"> Lainya 

                        </td>

                    </tr>

                    <tr>

                        <td>Tkp</td>

                        <td><input class="form-control" type="text" name="tkp" value="" placeholder="Tempat kejadian perkara..." maxlength="50" size="100px"></td>

                    </tr>

                    <tr>
                        <td>Foto</td>
                        <td><input type="file" class="form-control" name="gambar" required></td>
                    </tr>

                    <tr>

                        <td>Uraian Pengaduan</td>

                        <td><textarea class="ckeditor" name="isi"></textarea></td>

                    </tr>

                    <tr>

                        <td colspan="2" align="center">

                            <input class="btn btn-warning" type="reset" name="batal" value="BATAL" />

                            <input class="btn btn-info" type="submit" name="simpan" value="SIMPAN" />

                        </td>

                    </tr>

                    <tr>

                        <td colspan="2" align="center">

                            <?php

                            error_reporting(0);
                            require_once("koneksi.php");




                            $np=$_POST['np'];

                            $kategori=$_POST['kategori'];

                            $tkp=$_POST['tkp'];

                            $isi=$_POST['isi'];

                            $simpan=$_POST['simpan'];

                            if (isset($simpan))

                            {
                                $dir_gambar = 'asset/img/aduan/';
                                $filename = basename($_FILES['gambar']['name']);
                                $type = basename($_FILES['gambar']['type']);
                                $filenamee = date("YmdHis").'-'.$np.'.'.$type;
                                $uploadfile = $dir_gambar . $filenamee;

                                if ($np=='')

                                {

                                    echo "Np belum diisi !!!...";

                                }

                                else if ($kategori=='')

                                {

                                    echo "Kategori belum diisi !!!...";

                                }

                                else if ($tkp=='')

                                {

                                    echo "Tkp belum diisi !!!...";

                                }

                                else if ($isi=='')

                                {

                                    echo "Uraian pengaduan belum diisi !!!...";

                                }

                                else if ($filename == '')

                                {

                                    echo "Foto belum dipilih !!!...";

                                }

                                else 

                                {
                                    if (move_uploaded_file($_FILES['gambar']['tmp_name'], $uploadfile)) {
                                        $query1="insert into aduan (np,kategori,tkp,isi,gambar) values ('$np','$kategori','$tkp','$isi','$filenamee')";
                                        $simp=mysqli_query($konek, $query1) or die ('Gagal Query');
                                        if ($simp) {
                                            echo '

                                                <script type="text/javascript">
        
                                                alert("Data Pengaduan Berhasil Ditambahkan");
        
                                                window.location="korban.php";
        
                                                </script>
        
                                            ';
                                         }else{
                                             echo '<script>window.alert("Data Gagal Tersimpan")</script>';
                                         }
                                   }else {
                                        echo '<script>window.alert("Foto Gagal Tersimpan")</script>';
                                   }

                                }

                            }

                            ?>      

                        </td>

                    </tr>

                </table>

                <?php

                    }

                ?>

            </form>    

            </div>

        <br> 

        </div>

    </div>    

    

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

        <script src="js/bootstrap.min.js"></script>     

    </div>  

    <!-- Container -->

</body>

</html>

