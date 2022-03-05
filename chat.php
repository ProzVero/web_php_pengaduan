<?php include "koneksi.php";?>



<script language="JavaScript" type="text/javascript">

  function addSmiley(textToAdd){

  document.formshout.pesan.value += textToAdd;

  document.mysqli_out.pesanmysqli_();

}

</script>



<?php

$qshoutbox=mysqli_num_rows(mysqli_query($konek, "select * from pesan"));

if ($qshoutbox > 0){

  echo "<iframe src='shoutbox.php' width=230 height=150 border=1 solid></iframe><br /><br />";

  echo "<table class=shout width=20%>

        <form name=formshout action=simpanshoutbox.php method=POST>

        <tr><td>Nama</td><td>  <input class=shout type=text name=nama size=21></td></tr>

        <tr><td>Website</td><td>  <input class=shout type=text name=website size=21></td></tr>

        <tr><td valign=top>Pesan</td><td>  <textarea class=shout name='pesan' style='width: 181px; height: 30px;'></textarea></td></tr>";

?>

        <tr><td colspan=2>

        <a onClick="addSmiley(':-)')"><img src='smiley/1.gif'></a> 

        <a onClick="addSmiley(':-(')"><img src='smiley/2.gif'></a>

        <a onClick="addSmiley(';-)')"><img src='smiley/3.gif'></a>

        <a onClick="addSmiley(';-D')"><img src='smiley/4.gif'></a>

        <a onClick="addSmiley(';;-)')"><img src='smiley/5.gif'></a>

        <a onClick="addSmiley('<:D>')"><img src='smiley/6.gif'></a>

        </td></tr>

<?php

  echo "<tr><td colspan=2><input class=shout type=submit name=submit value=Kirim><input class=shout type=reset name=reset value=Reset></td></tr>

        </form></table><br />";

		}

?>

