<?php
	$host = "localhost";
	$data = "stdpsiquiatria";
	$user = "root";
	$pass = "";
	$mysqli = new mysqli($host, $user, $pass, $data);
	$mysqli->query('SET NAMES utf8');
	if ($mysqli->connect_error) {
		printf("ERRO MySQLi: %s\n", $mysqli->connect_error);
		exit();
	}
?>