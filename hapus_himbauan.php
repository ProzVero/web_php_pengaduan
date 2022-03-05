<?php

    $no=$_GET['no'];

    $query="DELETE FROM `himbauan` WHERE `himbauan`.`no` = '$no'";

    require_once('koneksi.php');

    if(mysqli_query($konek, $query))

        echo'<script type="text/javascript">

                alert("Berhasil Hapus");

                window.location="tabel_himbauan.php"

            </script>';

    else

        echo 'Gagal Hapus';

?>