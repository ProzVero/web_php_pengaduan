<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Phone</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <link rel="icon" href="asset/img/favicon.png" type="image/x-icon" />
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="admin/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="admin/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <link href="admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
    <link href="admin/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
    <link href="admin/dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="admin/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>
<body background="asset/img/sunset.jpg">
 <br>
  <div class="col-md-12">
    <?php include"navbar.php"; ?>
  </div>

  

  <div class="col-md-12">
  <div class="panel">
    <div class="table-responsive">
            <form action="" method="post">
            <table class="table table-hover table-bordered">
              <tr class="info">
                <td colspan="2"><h5><p align="center"><b>Aduan Via Smarthphone</b></p></h5></td>
              </tr>
              <tr>
                <td>Nama</td>
                <td><input class="form-control" type="text" name="nama" value="" placeholder="Tulis nama anda..."></td>
              </tr>
              <tr>
                <td>Alamat</td>
                <td><input class="form-control" type="text" name="alamat" value="" placeholder="Tulis alamat anda..."></td>
              </tr>
              <tr>
                <td>No Hp</td>
                <td><input class="form-control" type="text" name="nohp" value="" placeholder="Tulis no hp anda..."></td>
              </tr>
              <tr>
                <td>Uraian</td>
                <td><input class="form-control" type="text" name="uraian" value="" placeholder="Tulis uraian pengaduan..."></td>
              </tr>
              <tr>
                <td>Tkp</td>
                <td><input class="form-control" type="text" name="tkp" value="" placeholder="Tulis tempat kejadian perkara..."></td>
              </tr>
              <tr>
                <td>Jumlah Pelaku</td>
                <td><input class="form-control" type="text" name="jmlpelaku" value="" placeholder="Tulis jumlah pelaku..."></td>
              </tr>
              <tr>
                <td>Jumlah Korban</td>
                <td><input class="form-control" type="text" name="jmlkorban" value="" placeholder="Tulis jumlah korban..."></td>
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
                 $db=mysql_connect("sql304.epizy.com","epiz_30566725","xSmpWtgLff");
                                mysql_select_db("epiz_30566725_pengaduan",$db) or die ('Gagal Koneksi');

                  $nama=$_POST['nama'];
                  $alamat=$_POST['alamat'];
                  $nohp=$_POST['nohp'];
                  $uraian=$_POST['uraian'];
                  $tkp=$_POST['tkp'];
                  $jmlpelaku=$_POST['jmlpelaku'];
                  $jmlkorban=$_POST['jmlkorban'];
                  $simpan=$_POST['simpan'];
              

                  if (isset($simpan))
                  {

                  if ($nama=='')
                  {
                  echo "Nama belum diisi !!!...";
                  }
                  else if ($alamat=='')
                  {
                  echo "Alamat belum diisi !!!...";
                  }
                  else if ($nohp=='')
                  {
                  echo "No hp belum diisi !!!...";
                  }
                  else if ($uraian=='')
                  {
                  echo "Uraian Pengaduan belum diisi !!!...";
                  }
                  else if ($tkp=='')
                  {
                  echo "Tkp belum diisi !!!...";
                  }
                  else if ($jmlpelaku=='')
                  {
                  echo "Jumlah pelaku belum diisi !!!...";
                  }
                  else if ($jmlkorban=='')
                  {
                  echo "Jumlah korban belum diisi !!!...";
                  }
                  else 
                  {
                  $query1="insert into p_aduan (nama,alamat,nohp,uraian,tkp,jmlpelaku,jmlkorban) 
                  values ('$nama','$alamat','$nohp','$uraian','$tkp','$jmlpelaku','$jmlkorban')";
                  mysql_query($query1,$db) or die ('Gagal Query');

                  echo "Terima kasih.. data berhasil disimpan...";
                  }
                  }
                  ?>      
                </td>
              </tr>
            </table>
          </div>
          </form>

  </div>  
 
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