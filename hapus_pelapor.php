<?php

    $np=$_GET['np'];

    $query="DELETE FROM pelapor WHERE np='$np'";

    include('koneksi.php');

    if(mysqli_query($konek, $query))

        echo'<script type="text/javascript">

                //alert("Berhasil Hapus");

                window.location="tabel_pelapor.php"

            </script>';

    else

        echo 'Gagal Hapus';

?>