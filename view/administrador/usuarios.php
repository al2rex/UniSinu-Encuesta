<?php
require '../../model/Usuarios.php';
if( !(isset($_SESSION["ingresar"]) and $_SESSION["ingresar"]=="yes") and $_SESSION["id_rol"]!=1 )
{
	header("Location: ".Conexion::ruta().Conexion::path()."Login");exit();
}
$users = new Usuarios();
$usuarios = $users->listarUsuarios();
?> 
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset= "UTF-8"/>
		<link rel="stylesheet" href="<?php echo Conexion::ruta()?>public/css/vida.css">
		<link href="<?php echo Conexion::ruta()?>public/css/bootstrap.min.css" rel="stylesheet"/>
		<title>Usuarios</title> <!-- Titulo de la Pagina -->
	</head>
	<body >
		<img src="<?php echo Conexion::ruta()?>public/img/logo_unisinu.png" lang="center">
		<div class="container">
			<div id="contenido">
				<header>
					<?php include 'menu.php'; ?>
				</header>
			</div>
			<div class="row">
			<div class="col-md-12">
				<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal">
					  Add Usuarios
				</button>
			</div>
				<div class="col-md-12">
					<table id="table-datos" class="table table-striped">
		                <thead>
		                    <tr>
		                        <th>Nombre</th>
		                        <th>Identificacion</th>
		                        <th>Correo</th>
		                        <th>Usuario</th>
		                        <th>Roll</th>
		                        <th>Estado</th>
		                        <th>Editar</th>
		                        <th>Eliminar</th>
		                    </tr>
		                </thead>
		                <tbody>
		                    <?php for($i=0;$i<sizeof($usuarios); $i++){ ;?>
		                    <tr>
		                        <td><?php echo $usuarios[$i]["name"] ?></td>
		                        <td><?php echo $usuarios[$i]["identificacion"] ?></td>
		                        <td><?php echo $usuarios[$i]["correo"] ?></td>
		                        <td><?php echo $usuarios[$i]["user"] ?></td>
		                        <td><?php echo $usuarios[$i]["nombre_tipousuario"] ?></td>
		                        <td><?php if($usuarios[$i]["estado"]=="activo"){ echo "ACTIVO"; }else{ echo "NO ACTIVO"; } ?></td>
		                        <td>
		                            <button type="button" class="btn btn-info btn-sm" onclick=''><span class="glyphicon glyphicon-pencil"></span> Editar</button>
		                        </td>
		                        <td>
		                        <?php if ($usuarios[$i]["id_tipousuario"] != 1){ ?>
		                            <button type="button" class="btn btn-danger btn-sm" onclick=""><span class="glyphicon glyphicon-lock"></span> Eliminar</button>
		                        <?php } ?>
		                        </td>
		                    </tr>
		                    <?php
		                    }
		                    ?>
		                </tbody>
		            </table>
				</div>
			</div>
		</div>
		<script type="text/javascript" src="<?php echo Conexion::ruta()?>public/js/jquery-1.11.2.js"></script>	
		<script type="text/javascript" src="<?php echo Conexion::ruta()?>public/js/bootstrap.min.js"></script>
		<script src="<?php echo Conexion::ruta()?>public/js/jquery.dataTables.js"></script>
		<script src="<?php echo Conexion::ruta()?>public/js/dataTables.bootstrap.js"></script>
		<script type="text/javascript" src="<?php echo Conexion::ruta()?>public/js/administrador.js"></script>
		<script>
		    $(document).ready(function () {
		        $('#table-datos').DataTable();
		    });
		</script>

		<!-- Modal -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">Registrar usuarios administrativos</h4>
		      </div>
		      <div class="modal-body">
		        <div class="col-md-12">

                    <form class="form-horizontal" id="formUsuarios" >
                        <div class="form-group">
                            <label for="identificacion">Identificación</label>
                            <input type="number" class="form-control " id="identificacion" name="identificacion"
                                   placeholder="Identificación">
                        </div>
                        <div class="form-group ">
                            <label for="nombre_completo">Nombre Completo (*)</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" 
                                   placeholder="Ingrese nombre completo">
                        </div>
                        <div class="form-group">
                            <label for="Correo Electronico">Correo Electronico</label>
                            <input type="text" class="form-control" id="correo" name="correo" 
                                   placeholder="Ingrese correo electronico">
                        </div>
                         <div class="form-group">
                            <label for="ususario">Ususario (*)</label>
                            <input type="text" class="form-control" id="usuario" name="usuario" 
                                   placeholder="Ingrese usuario">
                        </div>
                        <div class="form-group">
                            <label for="Usuario">Contraseña (*)</label>
                            <input type="password" class="form-control" id="pass" name="pass" 
                                   placeholder="Ingrese contraseña">
                        </div>
                        <div class="form-group">
                            <label for="Password">Roll (*)</label>
                            <select class="form-control" id="roll" name="roll">
                            <?php 
                            $users = new Usuarios();
                            $tipo_usuario = $users->listarTipoUsuarios();
                            for($i=0;$i<sizeof($tipo_usuario);$i++){ ?>
                            	<option value="<?php echo $tipo_usuario[$i]["id_tipo_usuario"] ?>"><?php echo $tipo_usuario[$i]["nombre_tipousuario"] ?></option>
                            <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Password">Estado (*)</label>
                            <select class="form-control" id="estado" name="estado">
                            	<option value="activo">ACTIVO</option>
                            	<option value="no_activo">NO ACTIVO</option>
                            </select>
                        </div>
                        <input type="hidden" id="boton" name="boton" value="registrar">
                        <button type="button" class="btn btn-success" id="registrarUsuario">Registrar</button>
                    </form>
                </div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
		      </div>
		    </div>
		  </div>
		</div>
	</body>
</html>