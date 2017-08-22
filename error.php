<?php
require_once("../models/Conexion.php");
include 'plantilla/header.php';
?>
<center><img id="j_idt14" src="../resources/img/sotramac.jpg" alt="" style="width: 1000px; height: 100px;" /></center><hr></hr>
<body role="document">
    <div class="container"> 
        <div class="row">
            <div class="col-md-6">
                <h1>OPSS!!! ERROR 404</h1>
                <p>
                    Lo que buscas, no se encuentra en este servidor
                </p>
                <a href="<?php echo Conexion::ruta() ?>Fitness/Inicio" class="btn btn-default btn-small">Regresar</a>
            </div>
            <div class="col-md-6">
                <img src="<?php echo Conexion::ruta() ?>resources/img/bus.jpg" alt="..." class="img-rounded">
            </div>
        </div>
    </div>
<?php
    include("plantilla/footer.php");
?>