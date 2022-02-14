<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>

	<title>Edit 1</title>

	<link rel="stylesheet" href="styles.css" type="text/css"/>

</head>

<body>

<table align="center">

	<tr>

		<td>	

			<div id="box">

				<div id="header">

					<table align="center">

						<tr>

							<td><h1>PEMROGRAMAN WEB I<h1></td>

						</tr>

					</table>
mysql_
				</div>mysql_

				<div id="link2">

					<table align="center">

						<tr>

							<td><a href="tampil.php" title="Output">Output</a></td>

						</tr>

					</table>

				</div>

				<div id="content1">

					<br /><br />

					<?php

					include "koneksi.php";



					$kodegame=$_GET['kode'];



					$q=mysql_query("select * from game where kodegame=$kodegame");

					$data=mysql_fetch_array($q);





					?>



					<mysql_cellpadding="10" align="center">

						<form method="post" action="">

						<tr>

							<td colspan="2" align="center"><h3>EDIT I</h3></td>

						</tr>

						<tr>

							<td>KODE GAME</td><td>: <input type="text" name="edit1" value="<?php echo $data['kodegame'];?>" /></td>

						</tr>

						<tr>

							<td>NAMA GAME</td><td>: <input type="text" name="edit2" value="<?php echo $data['namagame'];?>" /></td>

						</tr>

						<tr>

							<td>JENIS GAME</td><td>: <input type="text" name="edit3" value="<?php echo $data['jenisgame'];?>" /></td>

						</tr>

						<tr>

							<td>ASAL GAME</td><td>: <input type="text" name="edit4" value="<?php echo $data['asalgame'];?>" /></td>

						</tr>

						<tr>

							<td>PUBLISHER</td><td>: <input type="text" name="edit5" value="<?php echo $data['publisher'];?>" /></td>

						</tr>

						<tr>

							<td colspan="2" align="center"><input type="submit" name="ubah" value="UBAH" /></td>

						</tr>

					</form>

					</table>



					<?php

					include "koneksi.php";



					$kodegame=$_POST['edit1'];

					$namagame=$_POST['edit2'];

					$jenisgame=$_POST['edit3'];

					$asalgame=$_POST['edit4'];

					$publisher=$_POST['edit5'];

					$ubah=$_POST['ubah'];



					if (isset($ubah))

					{mysql_query("update game set namagame='$namagame', jenisgame='$jenisgame', asalgame='$asalgame', publisher='$publisher' where kodegame='$kodegame'");



					echo '

	  					<script type="text/javascript">

						alert("Data Berhasil Diperbaharui");

						window.location="tampil.php";

	  					</script>

					 '

					;}



					?>

				</div>	

	 

			</div>

		</td>

	</tr>

</table>	

</body>

</html>