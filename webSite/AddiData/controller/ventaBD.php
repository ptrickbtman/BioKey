<?php

include "../../models/venta.php";
include_once 'conexion.php';

class ventaBD extends venta
{
	public function allVentas(){
		$con = conexion();
		$sql = "SELECT `ID_VENT`, `COD_CERR`, `ID_BOL`, `SUBTOT_VENT`, `EST_LOG_VENT` FROM `ventas`";
        $jsondata = array();
		if ($result = $con->query($sql)) {
			if( $result->num_rows > 0 ) {
                //return $result->num_rows;
				while( $row = $result->fetch_object() ) {
					array_push($jsondata, $row);
				}
				return json_encode($jsondata);
			}else{
                return -2;
            }
		}else{
			$con->close();
			return -1;
	    }
	} 
}

?>