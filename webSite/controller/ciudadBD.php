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
			}else{
				$con->close();
				return "error";
			}

		}else{
			$con->close();
			return "error";
		}
	}

	public function buscarCiudadId(){
		$con = conexion();
		$jsondata = array();
		$sql = "SELECT `NOM_CIU` FROM `ciudad` WHERE `ID_CIU` = ".$this->id_ciudad;
		if ($result = $con->query($sql)) {
			if( $result->num_rows == 1 ) {
				$row = $result->fetch_array(MYSQLI_BOTH);
				return $row[0];
			}else{
				$con->close();
				return "error";
			}

		}else{
			$con->close();
			return "error";
		}
	}
	
}

?>