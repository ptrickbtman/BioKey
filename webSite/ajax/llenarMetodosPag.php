<?php 
include '../controller/metodoPagoBD.php';


$metPag = new metodoPagoBD(null,null,null); 


print_r(json_encode($metPag->selectMetPagActivos()));

?>