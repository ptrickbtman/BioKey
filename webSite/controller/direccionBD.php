<?php 
include "../models/direccion.php";
include_once 'conexion.php';

class direccionBD extends direccion {

	public function insertarDireccion(){
		$con = conexion();
		
		$sql = "INSERT INTO `direccion`(`ID_BOL`, `ID_REGION`, `ID_CIU`, `COMUNA_DIR`, `CALL1_DIR`, `CALL2_DIR`, `NUM_DIR`, `VILLA_DIR`, `BLOCK_DIR`, `EST_LOG_DIR`) VALUES (".$this->id_bol.", ".$this->id_region.", ".$this->id_ciu.", '".$this->comuna_dir."', '".$this->calle1_dir."', '".$this->calle2_dir."', ".$this->num_dir.", '".$this->villa_dir."', ".$this->block_dir.", ".$this->est_log_dir.")";

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