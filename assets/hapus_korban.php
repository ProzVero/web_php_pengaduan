<?php
    $nk=$_GET['nk'];
    $query="DELETE FROM korban WHERE nk='$nk'";
    include('koneksi.php');
    if(mysql_query($query))
        echo'<script type="text/javascript">
                //alert("Berhasil Hapus");
                window.location="tabel_korban.php"
            </script>';
    else
        echo 'Gagal Hapus';
?>