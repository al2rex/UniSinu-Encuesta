<?php
require '../model/Login.php';

if(isset($_POST["boton"]) and $_POST["boton"]=="ingresar")
{	
	if(!empty($_POST["usuario"]) and !empty($_POST["pass"]))
	{
		$login = new Login();
		$login->inicioSesion($_POST["usuario"], $_POST["pass"]);exit();
	}
}
if(isset($_POST["boton"]) and $_POST["boton"]=="cerrar")
{
	$login = new Login();
	$login->cerrarSesion();exit();
}
?>