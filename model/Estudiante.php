<?php
require 'Conexion.php';
class Estudiante{
	private $conexion;
    private $data;

	public function __construct(){
		$this->conexion = new Conexion();
        $this->data = array();
	}

	public function setNames() {
	    return $this->conexion->query("SET NAMES 'utf8'");
	}

	public function ingresarEstudiante($tipo_usuario, $identificacion, $nombreCom, $correo, $usuario, $pass, $estado)
	{
		self::setNames();
		$sql = " insert into usuarios values(null, ?, ?, ?, ?, ?, ?, now(), ?) ";
		$stmt = $this->conexion->prepare($sql);
		$stmt->bindParam(1, $tipo_usuario);
		$stmt->bindParam(2, $identificacion);
		$stmt->bindParam(3, $nombreCom);
		$stmt->bindParam(4, $correo);
		$stmt->bindParam(5, $usuario);
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
}
?>