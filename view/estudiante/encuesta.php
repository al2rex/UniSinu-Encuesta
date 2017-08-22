<?php
require '../../model/Encuesta.php';
if( !(isset($_SESSION["ingresar"]) and !$_SESSION["ingresar"]=="yes") and $_SESSION["id_rol"]!=7 )
{
	header("Location: ".Conexion::ruta().Conexion::path()."Login");exit();
}

$encuesta = new Encuesta();
$estado_encuesta = $encuesta->EncuestaAbierta();

?> 
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset= "UTF-8"/>
		<link rel="stylesheet" href="<?php echo Conexion::ruta()?>public/css/vida.css">
		<link href="<?php echo Conexion::ruta()?>public/css/bootstrap.min.css" rel="stylesheet"/>
		<title>Encuesta - Estudiante</title> <!-- Titulo de la Pagina -->
	</head>
	<body >
		<img src="<?php echo Conexion::ruta()?>public/img/logo_unisinu.png" lang="center">
		<div id="contenido">
			<header>
				<?php include 'menu.php'; ?>
			</header>
		</div>
		<script type="text/javascript" src="<?php echo Conexion::ruta()?>public/js/jquery.js"></script>	
		<script type="text/javascript" src="<?php echo Conexion::ruta()?>public/js/estudiante.js"></script>
		<div class="container">
			<div class="row">
				
				<?php 
					if (count($estado_encuesta)===0) {
				?>
				<div class="col-md-12">
					<div class="alert alert-danger text-center"  id="error_50">
	                            <p>No tienes encuesta habilitada, por favor contactar al administrador</p>
	                        </div>
					</div>
				<?php
					} else{
				?>
				<div class="col-md-12">
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th>Nombre</th>
									<th>Estado</th>
									<th>Fecha Apertura</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><a href="#" onclick="window.location='Responder-Estudiante/<?php echo $estado_encuesta[0]["id_encuesta"]?>'"><?php echo $estado_encuesta[0]["nombre"] ?></a></td>
									<td><?php echo $estado_encuesta[0]["estado"] ?></td>
									<td><?php echo $estado_encuesta[0]["fecha_apertura"] ?></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<?php } ?>	
				
			</div>
		</div>
	</body>
</html>