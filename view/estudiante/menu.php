<hgroup>
	<!-- TItulo con Hipervinculo -->
	<h1>Bienvenido <strong><?php echo $_SESSION["nombre"] ?></strong></h1>
	<div class="btn-group">
		<button type="button" class="btn btn-danger" onclick="window.location='Dashboard-Estudiante'">Inicio</button>
		<button type="button" class="btn btn-danger" onclick="window.location='Encuesta-Estudiante'">Encuesta</button>
		<button type="button" class="btn btn-danger" onclick="window.location='#'">Actualizar Datos</button>
		<button type="button" class="btn btn-danger" id="salir" name="salir" >Cerrar Sesion</button>
	</div> 
</hgroup>