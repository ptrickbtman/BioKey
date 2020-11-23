<?php 
include '../controller/regionBD.php';
include '../controller/ciudadBD.php';
$datos = array();
$region = new regionBD(null,null,null); 
array_push($datos, $region->selectRegionesActivas());
$ciudad = new ciudadBD(null,null,null); 
array_push($datos, $ciudad->selectCiudadesActivas());
print_r(json_encode($datos));

?>