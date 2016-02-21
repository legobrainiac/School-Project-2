<?php
	error_reporting(false);
	function sairPagina() {
		if($_GET["func"] && $_GET["func"] == "sairPagina") {
			$eliminar = setcookie('unm', NULL, time()-3600);
			$eliminar2 = setcookie('psw', NULL, time()-3600);
			session_destroy();
			echo "<script> alert('Sessão terminada com sucesso!'); location.href='../index.php'</script>";
		}
	}
?>