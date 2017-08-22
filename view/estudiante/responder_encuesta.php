<?php
require '../../model/Preguntas.php';
//print_r($_GET);
if( !(isset($_SESSION["ingresar"]) and !$_SESSION["ingresar"]=="yes") and $_SESSION["id_rol"]!=7 )
{
	header("Location: ".Conexion::ruta().Conexion::path()."Login");exit();
}

$preguntas = new Preguntas();
$list_preguntas = $preguntas->preguntasEstudiantes();
//var_dump($list_preguntas);exit;
?> 
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset= "UTF-8"/>
		<link rel="stylesheet" href="<?php echo Conexion::ruta()?>public/css/vida.css">
		<link href="<?php echo Conexion::ruta()?>public/css/bootstrap.min.css" rel="stylesheet"/>
		<title>Administrador</title> <!-- Titulo de la Pagina -->
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
				<div class="col-md-13">
					<?php for($i=0;$i<sizeof($list_preguntas);$i++): ?>
						<?php echo $list_preguntas[$i]["pregunta"]; ?>
						<?php
						$preguntas = new Preguntas();
						$opcion_preg = $preguntas->opcionesPreguntasEstudiante($list_preguntas[$i]["id_pregunta"]);
						for($k=0;$k<sizeof($opcion_preg);$k++){
							echo "<br />";
							echo $opcion_preg[$k]["opcion"];							
							if($opcion_preg[$k]["id_tipo_opciones"]==1){ ?>
								<input type="text" name="caja_de_texto">
							<?php
							}
							if($opcion_preg[$k]["id_tipo_opciones"]==2){ ?>
								<input type="number" name="caja_de_texto">
							<?php
							}
							if($opcion_preg[$k]["id_tipo_opciones"]==4){ ?>
								<input type="radio" name="caja_de_texto">
							<?php
							}
							if($opcion_preg[$k]["id_tipo_opciones"]==5){ ?>
								<input type="date" name="caja_de_fecha">
							<?php
							}
							if($opcion_preg[$k]["id_tipo_opciones"]==6  && $opcion_preg[$k]["opcion"]=="TP"){ ?>
								<select id="caja_de_texto">
									<option value="0">Seleccione</option>
									<option value="1">Cedula</option>
								</select>
							<?php
							}
						}
						?>
						<hr />
					<?php endfor ?>	
				</div>
			</div>
		</div>
	</body>
</html>