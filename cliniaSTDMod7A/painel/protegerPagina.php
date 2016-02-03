<?php
	function protegerPagina() {
		if(!isset($_SESSION["user"])) {
			echo "<script> location.href='../login.php?login=false' </script>";
		}
	}
?>