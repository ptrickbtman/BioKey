<?php 
include "../models/registroCerr.php";
include 'conexion.php';

class registroCerrBD extends registroCerradura {

	public function agregarRegistro(){
		$con = conexion();
		$sql = "INSERT INTO `registros_cerr`(`COD_CERR`, `ID_TIPREGIS`, `FECH_REGIS`) VALUES ('". $this->cod_cerradura."','". $this->id_tipo_reg."','". $this->fecha_registro_cerr."')";
		if($con->query($sql)){
			$registros = "Agregado";
		}else{
			$registros = "error";
		}
		$this->cod_cerradura = $sql;
		$con->close();
		return $registros;
	} 

	public function obtenerRegistrosPorIdCerradura(){
		$con = conexion();
		$jsondata = array();
		$sql = "SELECT * FROM registros_cerr WHERE  `COD_CERR` = ". $this->cod_cerradura . "";
		$this->descripcion_registro_cerr =$sql;
		if ($result = $con->query($sql)) {
			if( $result->num_rows > 0 ) {
				while( $row = $result->fetch_object() ) {
					array_push($jsondata, $row);
				}
				return json_encode($jsondata);
			}else{
				return -1; // registros no asociados
			}
		}else{
			$con->close();
			return -2; // error de datos desloguear usuario
		}
	}

}
?>