<?php  
include_once "../../models/region.php";
include_once 'conexion.php';

class regionBD extends region {

	public function buscarRegPorId(){
		$con = conexion();
		$jsondata = array();
		$sql = "SELECT * FROM `region` WHERE `ID_REGION` = '".$this->id_region."'";
		if ($result = $con->query($sql)) {
			if( $result->num_rows == 1 ) {
				while( $row = $result->fetch_object() ) {
					array_push($jsondata, $row);
				}
				$con->close();
				return $jsondata;
			}else{
				$con->close();
                return -2; // no cerradiras
            }
        }else{
        	$con->close();
            return -3; // consulta error
        }
        
    }


}

?>