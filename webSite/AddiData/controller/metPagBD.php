<?php  
include_once "../../models/metodoPago.php";
include_once 'conexion.php';

class metodoPagoBD extends metodoPago {

	public function buscarMetPorId(){
		$con = conexion();
		$jsondata = array();
		$sql = "SELECT * FROM `metodo_pago` WHERE `ID_METPAG` = '".$this->id_menEnv."'";
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