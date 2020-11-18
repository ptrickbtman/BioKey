<?php 
include "models/registroCerr.php";
include 'conexion.php';

class registroCerrBD extends registroCerradura {

	public function agregarRegistro(){
		$con = conexion();
		$sql = "INSERT INTO `registros_cerr`(`COD_CERR`, `ID_TIPREGIS`, `FECH_REGIS`) VALUES ('". $this->cod_cerradura."','". $this->id_tipo_reg."','". $this->fecha_registro_cerr."')";
		if($con->query($sql)){
			$registros = "Registro agregado";
		}else{
			$registros = "error";
		}

		$con->close();
		return $registros;
	} 

}
?>