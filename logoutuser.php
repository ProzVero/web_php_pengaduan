<?php
session_start();
unset($_SESSION['username']);
echo '
	  	<script type="text/javascript">
		alert("Anda yakin ingin keluar? ...");
		window.location="index.php";
		</script>			
	 '
?>
