<?php
    include("../connection.php");
    session_start();
    include("protegerPagina.php");
    protegerPagina();
    include("../util.php");

	$table = $_GET["table"];
	$id = $_GET["id"];

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
			header('Location: index.php');
		}
	}
	else {
		alert("Erro ao eliminar o $type");
	}
?>