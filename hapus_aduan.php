<?php

    $kode=$_GET['kode'];

    $query="DELETE FROM aduan WHERE kode='$kode'";

    include('koneksi.php');

    if(mysqli_query($konek, $query))

        echo'<script type="text/javascript">

                alert("Berhasil Hapus");

                window.location="tabel_aduan.php"

            </script>';

    else

        echo 'Gagal Hapus';

?>