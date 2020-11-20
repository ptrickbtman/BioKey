<?php
include "../controller/cerraduraBD.php";


$cerradura = new cerraduraBD (null,null,null,null,null,null,null,null);
$cerradura->set_id_usuario_cerradura(1);
//print_r($cerradura);
$json= $cerradura->jsonCerraduraPorId(); 
print_r($json);


?>