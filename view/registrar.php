<?php 
require'../model/Conexion.php';
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8"/>
		<link rel="stylesheet" href="<?php echo Conexion::ruta()?>public/css/vida.css">
		<link href="<?php echo Conexion::ruta()?>public/css/bootstrap.min.css" rel="stylesheet"/>
		<link rel="icon" type="image/png" href="<?php echo Conexion::ruta()?>public/img/ico.png" />
		<title>Registrate</title>
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
		<div id="iniciar" style="width: 960px; height: 400px; margin: 0 auto;">
			<div id="registrar" style="width: 300px; height: 400px; margin-left: 370px; ">

				<!--Formulario de Registro del Usuario-->
				<form id="formEstudiante" name="formEstudiante">
					<span>Nombre y Apellidos:</span><br>
					<input name="nombre" id="nombre" type="text" placeholder="Nombre y Apellidos" class="form-control"/><br>

					<span>Nombre de Usuario:</span><br>
					<input name="usuario" id="usuario" type="text" placeholder="Nombre de Usuario" class="form-control"/><br/>

					<span>Identificación:</span><br>
					<input name="identificacion" id="identificacion" type="number" placeholder="Identificación" min="0" class="form-control" /><br>			

					<span>Contraseña:</span> <br/>
					<input name="pass" id="pass" type="password" placeholder="Contraseña" class="form-control"/><br/>

					<span>Repetir Contraseña:</span><br>
					<input name="re_pass" id="re_pass" type="password" placeholder="Repetir Contraseña" class="form-control"><br/>

					<!-- Botones-->
					<input type="hidden" name="boton" id="boton" value="registrarEstudiante">
					<button type="button" name="registrar" id="rEstudiante" class="btn btn-danger">Registrarse</button>
					<button type="reset" name="limpiar" class="btn btn-danger">Limpiar</button>
					<button type="button" name="cancelar" class="btn btn-danger" onclick="window.location='Login'">Cancelar</button>
				</form>
			</div>
		</div>
		<footer style="width: 960px; height: 50px;">
		<script type="text/javascript" src="<?php echo Conexion::ruta()?>public/js/jquery.js"></script>	
		<script type="text/javascript" src="<?php echo Conexion::ruta()?>public/js/registrar.js"></script>	
		</footer>
	</body>
</html>