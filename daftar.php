<?php 

error_reporting(0);

  session_start();

    if($_SESSION['username'])

    {

    include "user.php";

    }

    else

    {

 ?>    

<!DOCTYPE html>

<html>

<head>

	<meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Form Daftar</title>

    <link rel="icon" href="asset/img/favicon.png" type="image/x-icon" />

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!--link href="css/navbar.css" rel="stylesheet"-->

</head>

<body style="background-image: url('asset/img/polri.jpg'); height: 100%; background-position: center; background-repeat: no-repeat; background-size: cover;">

    <!-- Container -->

	<div>

        <?php include "navbar.php"; ?>
  </div>
  <div  class="container">

        <div class="panel panel-info col-md-9">

        	<br>

        	<div class="table-responsive">

        		<form action="" method="post" enctype="multipart/form-data">

        		<table class="table table-hover table-bordered">

        			<tr class="info">

        				<td colspan="2"><h5><p align="center"><b>FORM PENDAFTARAN</b></p></h5></td>

        			</tr>

        			<tr>

        				<td>Username</td>

        				<td><input class="form-control" type="text" name="username" value="" placeholder="Username..." maxlength="30" size="70px"></td>

        			</tr>

        			<tr>

        				<td>Password</td>
        				<td><input class="fomysqli_trol" type="password" name="password" value="" placeholder="Password..." maxlength="30" size="70px"></td>

        			</tr>

        			<tr>

        				<td>Nama</td>

        				<td><input class="form-control" type="text" name="nama" value="" placeholder="Tuliskan Nama Anda..." maxlength="30" size="70px"></td>

        			</tr>

              <tr>

        				<td>NIK</td>

        				<td><input class="form-control" type="number" name="nik" value="" placeholder="Tuliskan NIK Anda (16 Digit)" maxlength="16" minlength="16" size="70px"></td>

        			</tr>

        			<tr>

        				<td>Tempat Tanggal Lahir</td>

        				<td><input class="form-control" type="text" name="ttl" value="" placeholder="Tuliskan Tempat Tanggal Lahir Anda ..." maxlength="30" size="70px"></td>

        			</tr>

        			<tr>

        				<td>Jenis Kelamin</td>

        				<td>

        					<input type="radio" name="jk" value="Male"> Laki - Laki &nbsp&nbsp&nbsp

        					<input type="radio" name="jk" value="Female"> Perempuan

        				</td>

        			</tr>

        			<tr>

        				<td>Alamat</td>

        				<td><textarea class="form-control" name="alamat"  cols="71" placeholder="Tuliskan Alamat Lengkap Anda..."></textarea></td>

        			</tr>

        			<tr>

        				<td>Pekerjaan</td>

        				<td><input class="form-control" type="text" name="pekerjaan" value="" placeholder="Tuliskan Pekerjaan Anda..." size="70px"></td>

        			</tr>

        			<tr>

        				<td>Nomer Hp</td>

        				<td><input class="form-control" type="number" name="nohp" value="" placeholder="Tuliskan Nomer Hp Anda (12 Digit)" minlength="12" maxlength="12" size="70px"></td>

        			</tr>

              <tr>
                <td>Foto</td>
                <td><input type="file" class="form-control" name="gambar" required></td>
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

                  $username=$_POST['username'];

                  $password=$_POST['password'];

                  $nama=$_POST['nama'];

                  $nik=$_POST['nik'];

                  $ttl=$_POST['ttl'];

                  $jk=$_POST['jk'];

                  $alamat=$_POST['alamat'];

                  $pekerjaan=$_POST['pekerjaan'];

                  $nohp=$_POST['nohp'];

                  $simpan=$_POST['simpan'];

              



                  if (isset($simpan))

                  {
                    $dir_gambar = 'asset/img/pelapor/';
                    $filename = basename($_FILES['gambar']['name']);
                    $type = basename($_FILES['gambar']['type']);
                    $filenamee = date("YmdHis").'-'.$username.'.'.$type;
                    $uploadfile = $dir_gambar . $filenamee;



                  if ($username=='')

                  {

                  echo "Username belum diisi !!!...";

                  }

                  else if ($password=='')

                  {

                  echo "Password belum diisi !!!...";

                  }

                  else if ($nama=='')

                  {

                  echo "Nama belum diisi !!!...";

                  }

                  else if ($nik=='')

                  {

                  echo "nik belum diisi !!!...";

                  }

                  else if (strlen($nik)!=16)

                  {

                  echo "nik tidak berjumlah 16 digit";

                  }

                  else if ($ttl=='')

                  {

                  echo "Tempat Tanggal Lahir belum diisi !!!...";

                  }

                  else if ($jk=='')

                  {

                  echo "Silahkan pilih gender anda !!!...";

                  }

                  else if ($alamat=='')

                  {

                  echo "Alamat belum diisi !!!...";

                  }

                  else if ($pekerjaan=='')

                  {

                  echo "Pekerjaan belum diisi !!!...";

                  }

                  else if ($nohp=='')

                  {

                  echo "Nomor handphone belum diisi !!!...";

                  }
                  
                  else if (strlen($nohp)!=12)

                  {

                  echo "Nomor handphone tidak berjumlah 12 digit";

                  }

                  else if ($filename == '')

                  {

                      echo "Foto belum dipilih !!!...";

                  }

                  else 

                  {
                  require_once("koneksi.php");

                  if (move_uploaded_file($_FILES['gambar']['tmp_name'], $uploadfile)) {
                      $query1="insert into pelapor (username,password,nama,nik,ttl,jk,alamat,pekerjaan,nohp,gambar)
                      values ('$username','$password','$nama','$nik','$ttl','$jk','$alamat','$pekerjaan','$nohp','$filenamee')";
                      mysqli_query($konek, $query1) or die ('Gagal Query');

                      echo "Terima kasih.. anda telah terdaftar...";
  
                  }else {
                      echo '<script>window.alert("Foto Gagal Tersimpan")</script>';
                  }
                  }

                  }

                  ?>      

                </td>

              </tr>

        		</table>

        	</div>

        	</form>

        </div>



 

  <div class="col-md-3">

    <div class="well well-sm">

      <caption><p align="center"><b>Visitor</b></p></caption>

      <div class="panel panel-danger">

        <div class="table-responsive">

          <table class="table">

            <tr class="warning">

              <td><span class="glyphicon glyphicon-user"></span> Jumlah User</td>

              <td>

                <?php

                  include "koneksi.php";

                  $query = mysqli_query($konek, "SELECT * FROM pelapor");

                  $jumlah = mysqli_num_rows($query);



                  echo "$jumlah";

                ?>

              </td>

            </tr>

            <tr  class="warning">

              <td><span class="glyphicon glyphicon-user"></span> Jumlah Pengunjung</td>

              <td>0</td>

            </tr>

          </table>

        </div>

      </div>

    </div>

  </div>

            



	  

      

	</div>	



    <!-- Container -->

<!-- jQuery -->

    <script src="js/bootstrap.min.js"></script>

    <script src="admin/bower_components/jquery/dist/jquery.min.js"></script>

    <script src="admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <script src="admin/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <script src="admin/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>

    <script src="admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <script src="admin/dist/js/sb-admin-2.js"></script>

    <script>

    $(document).ready(function() {

        $('#dataTables-example').DataTable({

                responsive: true

        });

    });

    </script>

</body>

</html>

<?php 

    }

 ?>