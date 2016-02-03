<?php
	error_reporting(false);
	function sairPagina() {
		if($_GET["func"] && $_GET["func"] == "sairPagina") { 
			session_destroy();
			setcookie("unm", "", time());
			echo("<script>alert('cookie unm')</script>");
			setcookie("psw", "", time());
			echo("<script>alert('cookie psw')</script>");
			echo "<script> alert('Você saiu do painel com sucesso!'); location.href='../index.php'</script>";
		}
	}
?>