<?php  
include '../models/region.php';
include_once 'conexion.php';
class regionBD extends region
{
	
	public function selectRegionesActivas(){

		$con = conexion();
		$jsondata = array();
		$sql = "SELECT `ID_REGION`, `NOM_REGION` FROM `region` WHERE `EST_LOG_REG` = 1";
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

	public function buscarRegionId(){
		$con = conexion();
		$jsondata = array();
		$sql = "SELECT `NOM_REGION` FROM `region` WHERE `ID_REGION` =".$this->id_region;
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