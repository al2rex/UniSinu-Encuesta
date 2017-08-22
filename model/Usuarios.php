<?php 
require 'Conexion.php';
class Usuarios{

	private $conexion;
    private $data;

	public function __construct(){
		$this->conexion = new Conexion();
        $this->data = array();
	}

	public function setNames() {
	    return $this->conexion->query("SET NAMES 'utf8'");
	}

	public function listarUsuarios(){
		self::setNames();
        $sql = " select * from "
        	  ." usuarios as u "
        	  ." INNER JOIN "
        	  ." tipo_usuario as tpu "
        	  ." ON "
        	  ." u.id_tipousuario = tpu.id_tipo_usuario;
        	   ";
        foreach ($this->conexion->query($sql) as $row) {
            $this->data[] = $row;
        }
        return $this->data;
	}

	public function listarTipoUsuarios()
	{
		self::setNames();
		$sql = " select * from tipo_usuario order by id_tipo_usuario desc; ";
		foreach ($this->conexion->query($sql) as $row) {
            $this->data[] = $row;
        }
        return $this->data;
	}

	public function email_valido($email) {
        $mail_correcto = 0;
        //compruebo unas cosas primeras 
        if ((strlen($email) >= 6) && (substr_count($email, "@") == 1) && (substr($email, 0, 1) != "@") && (substr($email, strlen($email) - 1, 1) != "@")) {
            if ((!strstr($email, "'")) && (!strstr($email, "\"")) && (!strstr($email, "\\")) && (!strstr($email, "\$")) && (!strstr($email, " "))) {//miro si tiene caracter .
                if (substr_count($email, ".") >= 1) {//obtengo la terminacion del dominio 
                    $term_dom = substr(strrchr($email, '.'), 1);
                    //compruebo que la terminaci?n del dominio sea correcta 
                    if (strlen($term_dom) > 1 && strlen($term_dom) < 5 && (!strstr($term_dom, "@"))) {//compruebo que lo de antes del dominio sea correcto 
                        $antes_dom = substr($email, 0, strlen($email) - strlen($term_dom) - 1);
                        $caracter_ult = substr($antes_dom, strlen($antes_dom) - 1, 1);
                        if ($caracter_ult != "@" && $caracter_ult != ".") {
                            $mail_correcto = 1;
                        }
                    }
                }
            }
        }
        if ($mail_correcto)
            return true;
        else
            return false;
    }
	

	public function validar_identificacion($identificacion){
		$sql = " select identificacion from usuarios where identificacion = ?; ";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute(array($identificacion));
        $num = $stmt->rowCount();
        if ($num == 0) {
            return true;
        } else {
            return false;
        }
	}

	public function validar_usuario($usuario){
		$sql = " select identificacion from usuarios where user = ?; ";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute(array($usuario));
        $num = $stmt->rowCount();
        if ($num == 0) {
            return true;
        } else {
            return false;
        }
	}

	public function validar_email($email){
		$sql = " select identificacion from usuarios where correo = ?; ";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute(array($email));
        $num = $stmt->rowCount();
        if ($num == 0) {
            return true;
        } else {
            return false;
        }
	}

	public function guardarUsuario(
		$tipoUsuario, $identificacion, $name, $correo, $user, $pass, $estado
		){
		self::setNames();
		$pass = md5($pass);
		$sql = " insert into usuarios values(null, ?, ?, ?, ?, ?, ?, now(), ?); ";
        
		$stmt = $this->conexion->prepare($sql);
		$stmt->bindParam(1, $tipoUsuario);
		$stmt->bindParam(2, $identificacion);
		$stmt->bindParam(3, $name);
		$stmt->bindParam(4, $correo);
		$stmt->bindParam(5, $user);
		$stmt->bindParam(6, $pass);
		$stmt->bindParam(7, $estado);
		if($stmt->execute())
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}

?>