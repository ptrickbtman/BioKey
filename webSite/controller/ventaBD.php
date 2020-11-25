<?php

include "../models/venta.php";
include_once 'conexion.php';

class ventaBD extends venta
{
	public function insertarVenta(){
		$con = conexion();
		
		$sql = "INSERT INTO `ventas` (`COD_CERR`, `ID_BOL`, `SUBTOT_VENT`, `EST_LOG_VENT`) values (".$this->cod_cerradura.", ".$this->id_bol.", ".$this->subtot_vent.", ".$this->est_log_vent.")";

		if($con->query($sql)){
			$respuesta = 1;
		}else{
			$respuesta = 0;
		}

		$con->close();
		return $respuesta;
	} 
	
}

?>