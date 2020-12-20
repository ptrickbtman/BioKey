<?php  
include "../../models/direccion.php";
include_once 'conexion.php';

class direccionBD extends direccion {

	public function buscarDirPorIdBol(){
		$con = conexion();
		$jsondata = array();
		$sql = "SELECT * FROM `direccion` WHERE `ID_BOL` = '".$this->id_bol."'";
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