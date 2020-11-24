<?php  
include '../controller/cerraduraBD.php';
if (isset($_POST['idC'])) {
	$cerradura = new cerraduraBD($_POST['idC'], null, null, null, null, null,null, null);
	$cerradura = $cerradura->selectCerradura();
	print_r(json_encode($cerradura));
}
?>