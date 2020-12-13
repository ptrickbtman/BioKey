<?php
include '../controller/cerraduraBD.php';
session_start();

if (isset($_POST['idC']) && isset($_SESSION["usuario"])) {
    $id = $_POST['idC'];
    
	$cerradura = new cerraduraBD(null, null, null, null, null, null,null, null);
    date_default_timezone_set("America/Santiago");
    $fecha_act = date("d-m-Y G:i");
    
    $cerradura->set_cod_cerradura($id);
    $cerradura->set_fecha_cerradura($fecha_act);
    $cerradura->set_estado_cerradura(4);
    //print_r($_SESSION["usuario"]);
	if($cerradura->desasociarCerradura()){
        echo 1; //ready
    }else{
        print_r($cerradura);
        echo -2; // error de programacion
    }
}

?>