<?php
//print_r($_POST);
require '../model/Estudiante.php';

if(isset($_POST["boton"]) and $_POST["boton"]=="registrarEstudiante")
{	
	if(!empty($_POST["nombre"]) and !empty($_POST["usuario"]) and !empty($_POST["identificacion"]) and !empty($_POST["pass"]) and !empty($_POST["re_pass"]) )
	{
		if($_POST["pass"] == $_POST["re_pass"])
		{
			if(is_numeric($_POST["identificacion"]))
			{
				$estudiante = new Estudiante();
				if($estudiante->validar_identificacion($_POST["identificacion"]))
				{
					if($estudiante->validar_usuario($_POST["usuario"]))
					{
						if($estudiante->ingresarEstudiante(7, $_POST["identificacion"], $_POST["nombre"], NULL, $_POST["usuario"], md5($_POST["pass"]), "activo"))
						{
							echo 50;//ingreso exitoso
						}
						else
						{
							echo 60;//no se pudo ingresar
						}
					}
					else
					{
						echo 40;//el usuario ya existe
					}
				}
				else
				{
					echo 30; // la identificacion ya existe
				}
			}
			else
			{
				echo 20; // no es numerico
			}
		}
		else
		{
			echo 70; // contraseña no cohinciden
		}
	}
	else
	{
		echo 10;//campos vacios
	}
}

?>