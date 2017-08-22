<?php
require 'Conexion.php';
class Encuesta{
	private $conexion;
    private $data;

	public function __construct(){
		$this->conexion = new Conexion();
        $this->data = array();
	}

	public function setNames() {
	    return $this->conexion->query("SET NAMES 'utf8'");
	}

	public function EncuestaAbierta()
	{
		self::setNames();
		$sql = " select * from encuesta where estado = 'ABIERTA' ";
		$stmt = $this->conexion->prepare($sql);
		$stmt->execute();
		if ($row = $stmt->fetch()) {
            $this->data[] = $row;
        }
		return $this->data;
	}
}

?>