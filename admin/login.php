<?php

	$usuario  = $_POST["user"];
	$password = $_POST["passwd"];
	

	include_once("scripts/login.class.php");
	$login = new login($usuario, $password);

	$login->validarUsuario();

?>