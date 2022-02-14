<?php
    $npl=$_GET['npl'];
    $query="DELETE FROM pelaku WHERE npl='$npl'";
    include('koneksi.php');
    if(mysql_query($query))
        echo'<script type="text/javascript">
                //alert("Berhasil Hapus");
                window.location="tabel_pelaku.php"
            </script>';
    else
        echo 'Gagal Hapus';
?>