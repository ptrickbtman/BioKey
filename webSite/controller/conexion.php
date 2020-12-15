<?php


function conexion(){
    $server = "localhost";
	$user = "root";
	$pass = "";
	//$bd = "bdbiokey";
	$bd = "bdbiokey";

	$con = mysqli_connect($server, $user, $pass, $bd);
	$con->set_charset("utf8");
	//if (!$con) {
 	//echo("Conexion fallida: " . mysqli_connect_error());
	//}
	//echo "Conexion establecida";

    return $con;
}


?>