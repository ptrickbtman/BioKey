<?php
include "../controller/cerraduraBD.php";
$id = 5;
$cerradura = new cerraduraBD (null,null,null,null,null,null,null,null);
$cerradura->set_id_usuario_cerradura($id);

$json= $cerradura->jsonCerraduraPorId(); 

//print_r($json);
echo json_encode($json, JSON_FORCE_OBJECT);

?>