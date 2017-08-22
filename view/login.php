<?php require'../model/Conexion.php'; ?> 
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8"/>
		<link rel="stylesheet" href="<?php echo Conexion::ruta()?>public/css/vida.css">
		<link href="<?php echo Conexion::ruta()?>public/css/bootstrap.min.css" rel="stylesheet"/>
		<link rel="icon" type="image/png" href="<?php echo Conexion::ruta()?>public/img/ico.png" />
		<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">-->		
		<title>Login</title>
	</head>
	<body>
		<img src="<?php echo Conexion::ruta()?>public/img/logo_unisinu.png" lang="center">
		<div id="contenido">
			<header>
				<hgroup>
					<!-- TItulo con Hipervinculo -->
					<h1>BIENVENIDO</h1> 
				</hgroup>
			</header>
		</div>
		<div id="iniciar">
			<div class="entrar" style="width: 250px; height: 220px; margin: 0 auto; padding-left: 30px; ">

				<!--Formulario de Inicion del Usuario-->
				<form id="form-login" name="form-login">
					<span>Nombre de Usuario:</span> 
					<input name="usuario" type="text" class="form-control" id="usuario" autocomplete="on" placeholder="Nombre de Usuario"><br/>
					<span>Contraseña:</span><br>
					<input name="clave" type="password" class="form-control" id="clave" placeholder="Contraseña"><br/>

					<!-- Botones-->
					<button type="button" onclick="ingresar();" class="btn btn-danger">Entrar</button>
					<button type="button" class="btn btn-danger"><a href="">Cancelar</a></button>
					<!-- <span><h6><a href="php/grafica.php">No puedo entrar a mi cuenta</a></h6></span> -->
					<span><h6><a href="<?php echo Conexion::ruta().Conexion::path() ?>Registrar">Registrate</a></h6></span>
				</form>
			</div>
		</div>
		<script type="text/javascript" src="<?php echo Conexion::ruta()?>public/js/jquery.js"></script>	
		<script type="text/javascript" src="<?php echo Conexion::ruta()?>public/js/login.js"></script>
	</body>
</html>