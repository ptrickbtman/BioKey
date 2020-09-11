<?php

include 'conexion.php';
include "../models/usuarios.php";

// class

class usuariosDB extends usuario {
    
    public function insertUsu(){
        $con = conexion();
		$sql = "INSERT INTO usuarios (`CORREO_USU`, `ALIAS_USU`, `PASS_USU`, `NOM_USU`, `APE_USU`, `TEL_USU`, `FECHA_USU`, `EST_USU`) VALUES ('".$this->email."', '".$this->alias."' , '".$this->pass."', '".$this->name."', '".$this->surname."', '".$this->cell."', '".$this->date."', '".$this->estado."')";
		if ($con->query($sql) === TRUE) {
			$con->close();
			return true;
		} else {
			$con->close();
			return false;
        }
        
	}


	public function accessUsu(){
		$con = conexion();
		$sql = "SELECT `ID_USU`, `ALIAS_USU`, `NOM_USU` , `APE_USU`  ,`PASS_USU`, `EST_USU`  FROM usuarios WHERE";
		$data = $this->email;
		if($data == "" ){
			$sql .= " `ALIAS_USU` = '" .$this->alias."'";
		}else{
			$sql .= " `CORREO_USU` = '" .$this->email."'";
		}

		if ($resultado = $con->query($sql)) {
			$dataQueryPass = $resultado->fetch_assoc();
			if($dataQueryPass['PASS_USU'] == $this->get_pass() ){
				$this->set_id_user($dataQueryPass['ID_USU']);
				$this->set_name($dataQueryPass['NOM_USU']);
				$this->set_surname($dataQueryPass['APE_USU']);
				$this->set_alias($dataQueryPass['ALIAS_USU']);
				$this->set_name($dataQueryPass['NOM_USU']);
				$this->set_estado($dataQueryPass['EST_USU']);
				$this->set_hora(date("i"));
				$this->set_pass("");
				return $this;
				
			}
		}
	}
}


?>