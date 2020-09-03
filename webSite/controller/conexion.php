<?php
function conexion(){
    $server = "localhost";
	$user = "root";
	$pass = "";
	$bd = "bdBioKey";

	$con = mysqli_connect($server, $user, $pass, $bd);

//	if (!$con) {
// 	echo("Conexion fallida: " . mysqli_connect_error());
//	}
//	echo "Conexion establecida";
    return $con;
}   
?>