<?php
require 'Conexion.php';
class Preguntas{
	private $conexion;
    private $data;
    private $jTableResult;

	public function __construct(){
		$this->conexion = new Conexion();
        $this->data = array();
        $this->jTableResult = array();

	}

	public function setNames() {
	    return $this->conexion->query("SET NAMES 'utf8'");
	}

	public function listarPreguntas(){
		self::setNames();
		$total_count = " select COUNT(*) as total_reg from preguntas as p INNER JOIN categorias as c ON p.id_categoria = c.id_categorias; ";
		$stmt = $this->conexion->prepare($total_count);
		$stmt->execute();
		if($data = $stmt->fetch())
		{
			$total_reg = $data[0];
		}
		
		$sql = " select p.id_pregunta, c.id_categorias, p.pregunta, p.graficar from preguntas as p INNER JOIN categorias as c ON p.id_categoria = c.id_categorias ORDER BY ".$_GET["jtSorting"]." LIMIT ".$_GET["jtStartIndex"].",".$_GET["jtPageSize"]." ";
		$stmt = $this->conexion->prepare($sql);
		$stmt->execute();
		
		while($results = $stmt->fetchAll())
		{
			$this->data = $results;
		}
        $jTableResult = array();
		$jTableResult['Result'] = "OK";
		$jTableResult['TotalRecordCount'] = $total_reg;
		$jTableResult['Records'] = $this->data;

		for($i=0;$i<sizeof($jTableResult['Records']);$i++)
		{
			for($j=0;$j<sizeof($jTableResult['Records'][$i]);$j++)
			{
				unset($jTableResult['Records'][$i][$j]);
			}
		}

        return $jTableResult;
	}

	public function listarCategoria()
	{
		self::setNames();
		$sql = " select id_categorias, nombre_categoria from categorias ";
		$stmt = $this->conexion->prepare($sql);
		$stmt->execute();
		while($results = $stmt->fetchAll())
		{
			$this->data = $results;
		}
		$jTableResult = array();
		$datos = array();
		$jTableResult['Result'] = "OK";

		$datos['Options'] = $this->data;
		
		for($i=0;$i<sizeof($datos['Options']);$i++)
		{
			for($j=0;$j<sizeof($datos['Options'][$i]);$j++)
			{
				unset($datos['Options'][$i][$j]);
			}
		}
		for($k=0;$k<sizeof($datos['Options']);$k++)
		{
			$jTableResult['Options'][$k]=array('DisplayText' => $datos['Options'][$k]['nombre_categoria'], 'Value' => $datos['Options'][$k]['id_categorias']);
		}
        return $jTableResult;
	}
	public function insertarPregunta()
	{
		self::setNames();
		if(
			$_POST["id_categorias"]!=1 and !empty($_POST["pregunta"]) and $_POST["graficar"]!="null")
		{
			$str = strtoupper($_POST["pregunta"]);
			$sql = " select pregunta from preguntas where pregunta = ?; ";
			$stmt = $this->conexion->prepare($sql);
			$stmt->execute( array($str) );
			$num = $stmt->rowCount();
			if($num==0)
			{
				$usuario = $_SESSION["id_usuario"];
				$sql_insert = " insert into preguntas values (null, ?, ?, ?, ?, now()) ";
				
				$stmt = $this->conexion->prepare($sql_insert);
				$stmt->bindParam(1, $_POST["id_categorias"]);
				$stmt->bindParam(2, $usuario);
				$stmt->bindParam(3, $str);
				$stmt->bindParam(4, $_POST["graficar"]);
				if($stmt->execute())
				{
					$idPregunta = $this->conexion->lastInsertId();
					$this->jTableResult['Result'] = "OK";
					$this->jTableResult['Record']=array('id_pregunta' => $idPregunta, 'id_categorias' => $_POST["id_categorias"], 'pregunta' => $str, 'graficar' => $_POST["graficar"]);
					//$this->jTableResult['Record']=array('id_pregunta' => '5','id_categorias'=> "5",'pregunta'=>'55',"graficar" => "si");
				}
				else
				{
					$this->jTableResult['Result'] = "ERROR";
					$this->jTableResult['Message'] = 'Ops!! Ocurrio un error al momento de guardar en la base de datos' ;
				}
			}
			else
			{
				$this->jTableResult['Result'] = "ERROR";
				$this->jTableResult['Message'] = 'La pregunta que intenta ingresar, ya se encuentra registrada en el sistema' ;
			}

		}
		else
		{
			$this->jTableResult['Result'] = "ERROR";
			$this->jTableResult['Message'] = 'Los campos "Categoria", "Pregunta" y "Graficar", son obligatorios, por favor completa la informacion' ;
		}

		return $this->jTableResult;

	}
	/*
	 *PREGUNTAS VISTA ESTUDIANTE
	 */

	public function preguntasEstudiantes()
	{
		self::setNames();
		$sql = " select * from preguntas ";
		foreach($this->conexion->query($sql) as $row){
			$this->data[] = $row;
		}
		return $this->data;
	}
	public function opcionesPreguntasEstudiante($id_pregunta){
		self::setNames();
		$sql = " select * from opciones where id_pregunta = ?; ";
		$stmt = $this->conexion->prepare($sql);
		$stmt->execute( array($id_pregunta) );
		$num = $stmt->rowCount();
		if($num != 0)
		{
			while($row = $stmt->fetch()){
				$this->data[] = $row;
			}
		}
		return $this->data;
	}
}

?>