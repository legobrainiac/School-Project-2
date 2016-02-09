<?php
	error_reporting(false);
	function sairPagina() {
		if($_GET["func"] && $_GET["func"] == "sairPagina") { 
			session_destroy();
			echo "<script> alert('Você saiu do painel com sucesso!'); location.href='../index.php'</script>";
		}
	}
?>