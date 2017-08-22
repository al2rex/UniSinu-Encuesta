<?php
require '../model/Usuarios.php';$users = new Usuarios();
if(isset($_POST["boton"]) and $_POST["boton"]=="registrar")
{
	
	//print_r($_POST);exit;
	if(  !empty($_POST["identificacion"]) and !empty($_POST["nombre"]) and !empty($_POST["usuario"]) and !empty($_POST["pass"]) )
	{
		if(is_numeric($_POST["identificacion"]))
		{
			if($users->validar_identificacion($_POST["identificacion"]))
			{
				if(empty($_POST["correo"]))
				{
					$_POST["correo"]==null;
					if($users->validar_usuario($_POST["usuario"]))
					{
						if($users->guardarUsuario($_POST["roll"], $_POST["identificacion"], $_POST["nombre"], $_POST["correo"], $_POST["usuario"], $_POST["pass"], $_POST["estado"]))
						{
							echo 20;exit();//registro correcto
						}
						else
						{
							echo 17;exit();//ocurrio un error el guardar
						}
					}
					else
					{
						echo 16;exit();//usuario ya se encuentra registrado
					}
				}
				else
				{
					if($users->email_valido($_POST["correo"]))
					{
						if($users->validar_email($_POST["correo"]))
						{
							if($users->validar_usuario($_POST["usuario"]))
							{
								if($users->guardarUsuario($_POST["roll"], $_POST["identificacion"], $_POST["nombre"], $_POST["correo"], $_POST["usuario"], $_POST["pass"], $_POST["estado"]))
								{
									echo 20;exit();//registro correcto
								}
								else
								{
									echo 17;exit();//ocurrio un error el guardar
								}
							}
							else
							{
								echo 16;exit();//usuario ya se encuentra registrado
							}
						}
						else
						{
							echo 15;exit(); //email ya esta registrado
						}
					}
					else
					{
						echo 13;exit();//correo no es correcto
					}
				}
			}
			else
			{
				echo 12;exit();//ya la identificacion se encuentra registrada
			}
		}
		else
		{
			echo 11;exit();//la identificacion no es un numero
		}
	}
	else
	{
		echo 10;exit();//campos vacios
	}
}	

?>


