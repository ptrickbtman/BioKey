<?php

include_once "../../models/venta.php";
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
	public function valEstadoVen(){
        $con = conexion();
        $jsondata = array();
        $sql = "SELECT `ID_BOL` FROM `ventas` WHERE `COD_CERR`=".$this->cod_cerradura;
        $this->total_bol = $sql;
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

	public function buscarVentPorIdBol(){
		$con = conexion();
		$jsondata = array();
		$sql = "SELECT * FROM `ventas` WHERE `ID_BOL` = '".$this->id_bol."'";
		if ($result = $con->query($sql)) {
			if( $result->num_rows >= 1 ) {
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