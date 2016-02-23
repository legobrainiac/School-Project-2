<?php
    include("../connection.php");
    session_start();
    include("protegerPagina.php");
    protegerPagina();
    include("../util.php");

	$table = $_GET["table"];
	$id = $_GET["id"];
	if(isset($_GET["func"]) == "recup") {
		$activate = $mysqli->query("UPDATE users SET ativo = 1 WHERE ID = '$id'");
		header('Location: allUsers.php');
	}
	else {
		if($table == "consultas") {
			$type = "Consulta";
			$local = "consultas";
		}
		elseif($table == "users") {
			$type = "Utilizador";
			$local = "users";
		}

		$delete = $mysqli->query("UPDATE $local SET ativo = 0 WHERE ID = '$id'");

		if($delete) {
			if($type == "Consulta") {
				alert("Consulta desmarcada!");
				header('Location: consultasAgendadas.php');
			}
			else {
				alert("Utilizador Eliminado!");
				header('Location: allUsers.php');
			}
		}
		else {
			alert("Erro ao eliminar o $type");
		}
	}
?>