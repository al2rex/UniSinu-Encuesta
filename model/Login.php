<?php
require 'Conexion.php';

class Login{

	private $conexion;
    private $data;

	function __construct()
    {
        $this->conexion = new Conexion();
        $this->data = array();
    }

    public function cerrarSesion() {
        session_start();
        session_destroy();
    }
    
	public function inicioSesion($usuario, $password) {
        $estado = 'activo';
        $password = md5($password);
        $sql = " select id_usuarios, id_tipousuario, user, name "
        	  ." from "
        	  ." usuarios "
        	  ." where "
        	  ." user = ? "
        	  ." and "
        	  ." pass = ? "
        	  ." and "
              ." estado = ?
        	  ;";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(1, $usuario);
        $stmt->bindParam(2, $password);
        $stmt->bindParam(3, $estado);

        $stmt->execute();
        $num = $stmt->rowCount();

        if ($num == 0) {
            echo 404;// no exite usuario con los parametros ingresados
        } else {
            if ($row = $stmt->fetch()) {
                $this->data[] = $row;
            }
            switch ($this->data[0]["id_tipousuario"]) {
                case 1:
                	//Administrador
                    $_SESSION["ingresar"] = "yes";
                    $_SESSION["id_usuario"] = $this->data[0]["id_usuarios"];
                    $_SESSION["id_rol"] = $this->data[0]["id_tipousuario"];
                    $_SESSION["nombre"] = $this->data[0]["name"];
                    echo 201;//ingreso exitoso para administradores
                    break;
                case 2:
                	//Humano
                    $_SESSION["ingresar"] = "yes";
                    $_SESSION["id_usuario"] = $this->data[0]["id_usuarios"];
                    $_SESSION["id_rol"] = $this->data[0]["id_tipousuario"];
                    $_SESSION["nombre"] = $this->data[0]["name"];
                    echo 202;//ingreso exitoso para humano
                    break;
                case 3:
                	//Deporte
                    $_SESSION["ingresar"] = "yes";
                    $_SESSION["id_usuario"] = $this->data[0]["id_usuarios"];
                    $_SESSION["id_rol"] = $this->data[0]["id_tipousuario"];
                    $_SESSION["nombre"] = $this->data[0]["name"];
                    echo 203;//ingreso exitoso para Deporte
                    break;
                case 4:
                	//Cultura
                    $_SESSION["ingresar"] = "yes";
                    $_SESSION["id_usuario"] = $this->data[0]["id_usuarios"];
                    $_SESSION["id_rol"] = $this->data[0]["id_tipousuario"];
                    $_SESSION["nombre"] = $this->data[0]["name"];
                    echo 204;//ingreso exitoso para Cultura
                    break;
                case 5:
                	//Institucional
                    $_SESSION["ingresar"] = "yes";
                    $_SESSION["id_usuario"] = $this->data[0]["id_usuarios"];
                    $_SESSION["id_rol"] = $this->data[0]["id_tipousuario"];
                    $_SESSION["nombre"] = $this->data[0]["name"];
                    echo 205;//ingreso exitoso para institucional
                    break;
                case 6:
                    //Salud
                    $_SESSION["ingresar"] = "yes";
                    $_SESSION["id_usuario"] = $this->data[0]["id_usuarios"];
                    $_SESSION["id_rol"] = $this->data[0]["id_tipousuario"];
                    $_SESSION["nombre"] = $this->data[0]["name"];
                    echo 206;//ingreso exitoso para Salud
                    break;
                case 7:
                    //Estudiante
                    $_SESSION["ingresar"] = "yes";
                    $_SESSION["id_usuario"] = $this->data[0]["id_usuarios"];
                    $_SESSION["id_rol"] = $this->data[0]["id_tipousuario"];
                    $_SESSION["nombre"] = $this->data[0]["name"];
                    echo 207;//ingreso exitoso para estudiante
                    break;
                case 8:
                    //auxiliar
                    $_SESSION["ingresar"] = "yes";
                    $_SESSION["id_usuario"] = $this->data[0]["id_usuarios"];
                    $_SESSION["id_rol"] = $this->data[0]["id_tipousuario"];
                    $_SESSION["nombre"] = $this->data[0]["name"];
                    echo 208;//ingreso exitoso para auxiliar
                    break;
            }
        }
    }

}
?>