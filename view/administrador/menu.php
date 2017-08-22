<hgroup>
	<!-- TItulo con Hipervinculo -->
	<h1>Bienvenido <strong><?php echo $_SESSION["nombre"] ?></strong></h1>
	<div class="btn-group">
		<button type="button" class="btn btn-danger" onclick="window.location='Dashboard-Administrador'">Inicio</button>
		<button type="button" class="btn btn-danger" >Encuesta</button>
		<button type="button" class="btn btn-danger" onclick="window.location='Crear-Preguntas'">Crear Preguntas</button>
		<button type="button" class="btn btn-danger"><a href="#">Resultados</a></button>
		<button type="button" class="btn btn-danger"><a href="#">Consolidado</a></button>
		<button type="button" class="btn btn-danger" onclick="window.location='Usuarios'">Usuarios</button>
		<button type="button" class="btn btn-danger" id="salir" name="salir" >Cerrar Sesion</button>
	</div> 
</hgroup>