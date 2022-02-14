<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Form Korban</title>

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



                    $query=mysqli_query($konek, "select * from pelapor where username='$username'");

                    $query2=mysqli_query($konek, "SELECT * FROM `aduan` order by kode DESC limit 1");



                    while($d=mysqli_fetch_array($query))

                    while($r=mysqli_fetch_array($query2))

                    {

                ?>



                <table class="table table-hover table-bordered">

                    <tr class="warning">

                        <td colspan="2"><h5><p align="center"><b>FORM DATA KORBAN</b></p></h5></td>

                    </tr>

                    <tr>

                        <td>No Pelapor</td>

                        <td><input class="form-control" type="text" name="np" value="<?php echo $d['np'];?>" placeholder="" size="100px"></td>

                    </tr>

                    <tr>

                        <td>Kode Pengaduan</td>

                        <td><input class="form-control" type="text" name="kode" value="<?php echo $r['kode'];?>" placeholder="" size="100px"></td>

                    </tr>

                    <tr>

                        <td>Nama Korban</td>

                        <td><input class="form-control" type="text" name="nama" value="" placeholder="Beri nama Mr/Mrs x jika nama korban belum diketahui..." maxlength="30" size="100px"></td>

                    </tr>

                    <tr>
                        <td>Foto</td>
                        <td><input type="file" class="form-control" name="gambar" required></td>
                    </tr>

                    <tr>

                        <td>Jenis Kelamin</td>

                        <td>

                            <input type="radio" name="jk" value="Male"> Laki - Laki &nbsp&nbsp&nbsp

                            <input type="radio" name="jk" value="Female"> Perempuan

                        </td>

                    </tr>

                    <tr>

                        <td>Alamat Korban</td>

                        <td><textarea class="form-control" name="alamat"  cols="71" placeholder="Tuliskan alamat korban..."></textarea></td>

                    </tr>

                    <tr>

                    <tr>

                        <td>Ciri - ciri Korban</td>

                        <td><textarea class="ckeditor" name="ciri"></textarea></td>

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


                                $np=$_POST['np'];

                                $kode=$_POST['kode'];

                                $nama=$_POST['nama'];

                                $jk=$_POST['jk'];

                                $alamat=$_POST['alamat'];

                                $ciri=$_POST['ciri'];

                                $simpan=$_POST['simpan'];

              



                                if (isset($simpan))

                                {
                                    $dir_gambar = 'asset/img/korban/';
                                    $filename = basename($_FILES['gambar']['name']);
                                    $type = basename($_FILES['gambar']['type']);
                                    $filenamee = date("YmdHis").'-'.$np.'.'.$type;
                                    $uploadfile = $dir_gambar . $filenamee;



                                if ($np=='')

                                {

                                echo "Np belum diisi !!!...";

                                }

                                else if ($kode=='')

                                {

                                echo " Kode Pengaduan belum diisi !!!...";

                                }

                                else if ($nama=='')

                                {

                                echo "Nama korban belum diisi !!!...";

                                }

                                else if ($jk=='')

                                {

                                echo "Jenis kelamin korban belum diisi !!!...";

                                }

                                else if ($alamat=='')

                                {

                                echo " Alamat korban belum diisi !!!...";

                                }

                                else if ($ciri=='')

                                {

                                echo " Ciri-ciri korban belum diisi !!!...";

                                }

                                else if ($filename == '')

                                {

                                    echo "Foto belum dipilih !!!...";

                                }

                                else

                                {

                                    if (move_uploaded_file($_FILES['gambar']['tmp_name'], $uploadfile)) {
                                        $query1="insert into korban (np,kode,nama,jk,alamat,ciri,gambar) values ('$np','$kode','$nama','$jk','$alamat','$ciri','$filenamee')";
                                        $simp=mysqli_query($konek, $query1) or die ('Gagal Query');
                                        if ($simp) {
                                            echo '

                                                <script type="text/javascript">
        
                                                alert("Data Pengaduan Berhasil Ditambahkan");
        
                                                window.location="pelaku.php";
        
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

