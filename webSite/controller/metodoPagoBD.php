<?php  
include '../models/metodoPago.php';
include 'conexion.php';
class metodoPagoBD extends metodoPago
{
	public function selectMetPagActivos(){

		$con = conexion();
		$jsondata = array();
		$sql = "SELECT `ID_METPAG`, `NOM_METPAG` FROM `metodo_pago` WHERE `EST_LOG_METPAG` = 1";
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
			return 'Error';
		}
	}
	
}

?>