<?php
require '../../../model/Preguntas.php';
header('Content-type: application/json');
$preg = new Preguntas();
$r = $preg->insertarPregunta();
print json_encode($r);
?>


