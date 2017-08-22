<?php
require '../../../model/Preguntas.php';
header('Content-type: application/json');
	$preg = new Preguntas();
	$r = $preg->listarCategoria();
	print json_encode($r);

//print_r($r);
?>

