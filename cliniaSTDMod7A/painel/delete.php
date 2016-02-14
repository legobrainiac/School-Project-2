<?php
    include("../connection.php");
    session_start();
    include("protegerPagina.php");
    protegerPagina();
    include("../util.php");

	$table = $_GET["table"];
	$id = $_GET["id"];

	if($table == "posts") {
		$type = "Artigo";
		$local = "posts";
	}
	elseif($table == "users") {
		$type = "Utilizador";
		$local = "users";
	}

	$delete = $mysqli->query("UPDATE $local SET ativo = 0 WHERE ID = '$id'");

	if($delete) {
		alert("$type sucessfull deleted.'");
		header('Location: index.php');
	}
	else {
		alert("Erro ao eliminar o $type");
	}
?>