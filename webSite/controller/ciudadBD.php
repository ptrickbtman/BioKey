<?php  
include '../models/ciudad.php';
include_once 'conexion.php';
class ciudadBD extends ciudad
{
	
	public function selectCiudadesActivas(){

		$con = conexion();
		$jsondata = array();
		$sql = "SELECT `ID_CIU`, `NOM_CIU` FROM `ciudad` WHERE `EST_LOG_CIU` = 1";
		if ($result = $con->query($sql)) {
			if( $result->num_rows > 0 ) {
				while( $row = $result->fetch_object() ) {
					array_push($jsondata, $row);
				}
				$con->close();
				return $jsondata;
			}

		}else{
			$con->close();
			return False;
		}
	}
}

?>