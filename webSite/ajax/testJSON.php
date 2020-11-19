<?php
include "../controller/cerraduraBD.php";

if(isset($_POST["id"])){
    $id = $_POST["id"];
}else{
    $id =5;
}

$id = 5;
$cerradura = new cerraduraBD (null,null,null,null,null,null,null,null);
$cerradura->set_id_usuario_cerradura($id);
//print_r($cerradura);
$json= $cerradura->jsonCerraduraPorId(); 
//print_r($json);
echo json_encode($json, JSON_FORCE_OBJECT);

?>