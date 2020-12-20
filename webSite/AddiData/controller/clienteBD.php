<?php  
include "../../models/cliente.php";
include_once 'conexion.php';

class clienteBD extends cliente {

	public function buscarClientePorId(){
		$con = conexion();
		$jsondata = array();
		$sql = "SELECT * FROM `clientes` WHERE `RUT_CLI` = '".$this->rut_cliente."'";
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