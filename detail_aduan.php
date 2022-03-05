<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin</title>
    <link href="admin/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="admin/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <link href="admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
    <link href="admin/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
    <link href="admin/dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="admin/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <style type="text/css">
    @media (max-width: 680px) {
        .navbar-top-links .dropdown-user {
  right: 0;
  left: 10px;
}
    }
    </style>
</head>

<body>
    <?php
        session_start();
        $kode=$_GET['kode'];
        if(!isset($_SESSION['adminname'])) {
        header('location:loginadmin.php'); }
        else { $adminname = $_SESSION['adminname']; }
        require_once("koneksi.php");
            
        $query1 = mysqli_query($konek, "SELECT * FROM aduan WHERE kode = '$kode'");
        $query2 = mysqli_query($konek, "SELECT * FROM korban WHERE kode = '$kode'");
        $query3 = mysqli_query($konek, "SELECT * FROM pelaku WHERE kode = '$kode'");

    ?>
    <div id="wrapper">
        
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-th-large"></span> Halaman Depan</a>
                <a class="navbar-brand" href="admin.php"><span class="glyphicon glyphicon-cog"></span> Halaman Admin</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><b><?php echo "$adminname"; ?></b>
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                       
                        <li class="divider"></li>
                        <li><a href="logoutadmin.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <?php include "adminmenu.php"; ?>
        </nav>

        <div id="page-wrapper" class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-md-10">
                        <h3 class="page-header">Data Aduan</h3>
                    </div>
                    <div class="col-md-2">
                        <a class="page-header right btn btn-primary" href="cetak_aduan.php?kode=<?php echo $kode; ?>"><i class="glyphicon glyphicon-print"></i> CETAK</a>
                    </div>
                    
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <?php 
            
                $aduan = mysqli_fetch_array($query1);
                
                $np = $aduan['np'];
                $query4 = mysqli_query($konek, "SELECT * FROM pelapor WHERE np = '$np'"); 
                
                $korban = mysqli_fetch_array($query2);
                $pelaku = mysqli_fetch_array($query3);
                $pelapor = mysqli_fetch_array($query4);
                
            ?>

            <!-- /.row -->
            <div class="container col-md-12 center" style="line-height:9px;">
                <center>
                    <p><b>POLRI DAERAH SULAWESI SELATAN</b></p>
                    <p><b>RESORT PALOPO</b></p>
                    <p><b>SEKTOR WARA UTARA</b></p>
                    <p></p>
                    <!--img src="asset/img/lambang_polri.png" alt="" width=100px;-->
                    <img src="asset/img/lambang-polri.png" alt="" width="100px">
                </center>
                <p><b>LAPORAN POLISI</b></p>
                <p>Nomor : <?php echo $kode; ?></p><hr>
                <div class="container col-md-12" style="line-height:10px;">
                    <p style="border-top: 1px solid #bbb;"></p>
                    <p><b>YANG MELAPORKAN</b></p>
                    <p style="border-top: 1px solid #bbb;"></p>
                    <div class="col-md-9">
                        <table class="table ">
                            <tr>
                                <td><p>JENIS IDENTITAS</p></td> <td>:</td>
                            </tr>  
                            <tr>
                                <td><p>NAMA</p></td> <td>: <?php echo $pelapor['nama']; ?></td>
                            </tr>    
                            <tr>
                                <td><p>TEMPAT/TGL LAHIR</p></td><td>: <?php echo $pelapor['ttl']; ?></td>
                            </tr>   
                            <tr>
                                <td><p>JENIS KELAMIN</p></td><td>: <?php echo $pelapor['jk']; ?></td>

                            </tr>   
                            <tr>
                                <td><p>PEKERJAAN</p></td><td>: <?php echo $pelapor['pekerjaan']; ?></td>

                            </tr>   
                            <tr>
                                <td><p>ALAMAT/TEMPAT</p></td><td>: <?php echo $pelapor['alamat']; ?></td>

                            </tr>   
                            <tr>
                                <td><p>NO. TELP/FAX/EMAIL</p></td><td>: <?php echo $pelapor['nohp']; ?></td>

                            </tr>   
                        </table>
                    </div>
                </div>
                
                <div class="container col-md-12" style="line-height:10px;">
                    <p style="border-top: 1px solid #bbb;"></p>
                    <p><b>PERISTIWA YANG DI LAPORAKAN</b></p>
                    <p style="border-top: 1px solid #bbb;"></p>
                    <div class="table-responsive col-md-12">
                        <table class="table tabel-condensed">
                            <tr>
                                <td>1.</td>
                                <td><p>WAKTU KEJADIAN</p></td>
                                <td>:</td>
                                <td><?php echo $aduan['datetime']; ?></td>
                            </tr>  
                            <tr>
                                <td>2.</td>
                                <td><p>TEMPAT KEJADIAN</p></td>
                                <td>:</td>
                                <td><?php echo $aduan['tkp']; ?></td>
                            </tr>    
                            <tr>
                                <td>3.</td>
                                <td><p>APA YANG TERJADI</p></td>
                                <td>:</td>
                                <td><?php echo $aduan['kategori']; ?></td>
                            </tr>   
                            <tr>
                                <td>4.</td>
                                <td><p>SIAPA TERLAPOR</p></td>
                                <td>: </td>

                            </tr>   
                            <!--tr>
                                <td>5.</td><td><p>SAKSI-SAKSI</p></td><td>: -</td>

                            </tr>   
                            <tr>
                                <td></td><td><p>JENIS IDENTITAS</p></td><td>: </td>

                            </tr-->   
                            <tr>
                                <td></td><td><p>NAMA</p></td>
                                <td>:</td><td><?php echo $pelaku['nama']; ?></td>

                            </tr>     
                            <!--tr>
                                <td></td><td><p>TEMPAT/TGL LAHIR</p></td><td>: </td>

                            </tr-->   
                            <tr>
                                <td></td><td><p>JENIS KELAMIN</p></td>
                                <td>:</td><td><?php echo $pelaku['jk']; ?></td>

                            </tr>    
                            <!--tr>
                                <td></td><td><p>PEKERJAAN</p></td><td>: </td>

                            </tr-->   
                            <tr>
                                <td></td><td><p>ALAMAT</p></td>
                                <td>:</td><td><?php echo $pelaku['alamat']; ?></td>

                            </tr>   
                            <tr>
                                <td></td><td><p>CIRI-CIRI</p></td>
                                <td>:</td><td><?php echo $pelaku['ciri']; ?></td>

                            </tr>   
                            <!--tr>
                                <td></td><td><p>AGAMA</p></td><td>: </td>

                            </tr-->  
                            <tr>
                                <td>6. </td><td><p>KORBAN</p></td><td>: </td>

                            </tr>   
                            <!--tr>
                                <td></td><td><p>JENIS IDENTITAS</p></td><td>: </td>

                            </tr-->   
                            <tr>
                                <td></td><td><p>NAMA</p></td>
                                <td>:</td><td><?php echo $korban['nama']; ?></td>

                            </tr>     
                            <!--tr>
                                <td></td><td><p>TEMPAT/TGL LAHIR</p></td><td>: </td>

                            </tr-->   
                            <tr>
                                <td></td><td><p>JENIS KELAMIN</p></td>
                                <td>:</td><td><?php echo $korban['jk']; ?></td>
                            </tr>    
                            <!--tr>
                                <td></td><td><p>PEKERJAAN</p></td><td>: </td>
                            </tr-->   
                            <tr>
                                <td></td><td><p>ALAMAT</p></td>
                                <td>:</td><td><?php echo $korban['alamat']; ?></td>
                            </tr>   
                            <tr>
                                <td></td><td><p>CIRI-CIRI</p></td>
                                <td>:</td><td><?php echo $korban['ciri']; ?></td>
                            </tr>   
                            <!--tr>
                                <td></td><td><p>AGAMA</p></td><td>: </td>
                            </tr--> 
                        </table>
                    </div>
                </div>
                <div class="container col-md-12" style="line-height:10px;">
                    <p style="border-top: 1px solid #bbb;"></p>
                    <center>
                        <p><b>URAIAN KEJADIAN</b></p>
                    </center>
                    <p style="border-top: 1px solid #bbb;"></p>
                    <div class="table-responsive col-md-12">
                        <table class="table tabel-condensed">
                            <tr>
                                <td><p><b>KETERANGAN</b></p></td> <td>:</td><td><?php echo $aduan['isi']; ?></td>
                            </tr>   
                        </table>
                    </div>
                </div>
                <div class="container col-md-12" style="line-height:px;">
                    <p style="border-top: 1px solid #bbb;"></p>
                    <center>
                        <p><b>LAMPIRAN FOTO</b></p>
                    </center>
                    <p style="border-top: 1px solid #bbb;"></p>
                    <div class="col-md-12">
                        <div class="col-md-4">
                            <center>
                                <p>Foto Aduan</p>
                            
                            <img src="asset/img/aduan/<?php echo $aduan['gambar'] ?>" style="width: 90%;">
                            </center>
                        </div>
                        <div class="col-md-4">
                            <center>
                                <p>Foto Pelaku</p>
                                <img src="asset/img/pelaku/<?php echo $pelaku['gambar'] ?>" style="width: 90%;">
                            </center>
                            
                        </div>
                        <div class="col-md-4">
                            <center>
                                <p>Foto Korban</p>
                                <img src="asset/img/korban/<?php echo $korban['gambar'] ?>" style="width: 90%;">
                            </center>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="admin/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="admin/bower_components/metisMenu/dist/metisMenu.min.js"></script>
    <script src="admin/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    <script src="admin/dist/js/sb-admin-2.js"></script>
</body>
</html>
