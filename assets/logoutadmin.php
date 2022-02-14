<?php
session_start();
unset($_SESSION['adminname']);
echo '
	  	<script type="text/javascript">
		alert("Anda yakin ingin keluar? ...");
		window.location="index.php";
		</script>			
	 '
?>
