<?php
require '../../../model/Preguntas.php';
header('Content-type: application/json');
$preg = new Preguntas();
$r = $preg->listarPreguntas();
print json_encode($r);
?>

