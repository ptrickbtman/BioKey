<?php 
include "../models/boleta.php";
include_once 'conexion.php';

class boletaBD extends boleta {

	public function insertarBoleta(){
		$con = conexion();
		
		$sql = "INSERT INTO `boletas`( `ID_METPAG`, `RUT_CLI`, `CANT_PROD_BOL`, `TOT_BOL`, `ORDEN_BOL`, `FECH_BOL`, `EST_LOG_BOL`) VALUES  (".$this->id_metpag.", '".$this->rut_cliente."', ".$this->cant_env_bol.", ".$this->total_bol.", '".$this->orden_bol."', '".$this->fecha_bol."', ".$this->est_log_bol.")";

		if($con->query($sql)){
			$respuesta = $con->insert_id;
		}else{
			$respuesta = 0;
		}
		$this->set_id_metpag($sql);
		$con->close();
		return $respuesta;
	} 

 	public function validarOrdenCompra(){
            $con = conexion();
            $sql = "SELECT * FROM boletas WHERE `ORDEN_BOL` = '". $this->orden_bol."'";
             if ($resultado = $con->query($sql)) {
                $row_cnt = $resultado->num_rows;
                if($row_cnt==1){
                    return True;
                }
            }else{
                return False;
            }
        }
}


?>