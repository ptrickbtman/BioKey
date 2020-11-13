<?php
//include 'conexion.php';
include "../models/usuarios.php";
class usuariosDB extends usuario {
    

	public function accessUsu(){
		include 'conexion.php';
		include 'hashToSalted.php';
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
			if(hashVerify($dataQueryPass['PASS_USU'] , $this->get_pass())){
				$this->set_id_user($dataQueryPass['ID_USU']);
				$this->set_name($dataQueryPass['NOM_USU']);
				$this->set_surname($dataQueryPass['APE_USU']);
				$this->set_alias($dataQueryPass['ALIAS_USU']);
				$this->set_name($dataQueryPass['NOM_USU']);
				$this->set_estado($dataQueryPass['EST_USU']);
				$this->set_pass("");
				return True;
				
			}else{
				return False;
			}
		}else{
			return -3;
		}
	}

	public function modificarEstadoUsuario(){
		$con = conexion();
        $sql = "UPDATE `usuarios` SET `EST_USU`= '". $this->estado ."' WHERE  `ID_USU` = ". $this->id . "";
		if ($resultado = $con->query($sql)) {
            return true;
        }else{
            return false;
        }
	}
	
	// insertar usuario validando..
	// validando usuario registradooo para insertar

	public function buscarUsuarioRegEmail(){
		include 'conexion.php';
		$con = conexion();
        $sql = "SELECT `ID_USU`, `CORREO_USU`, `ALIAS_USU`, `PASS_USU`, `NOM_USU`, `APE_USU`, `TEL_USU`, `FECHA_USU`, `EST_USU` FROM `usuarios` WHERE `CORREO_USU` = '" .$this->email."' ";
		
		if ($resultado = $con->query($sql)) {
			$row_cnt = $resultado->num_rows;
			if($row_cnt==0){
				$con->close();
				return True;
			}else{
				$con->close();
				return false;
			}
        }else{
			$con->close();
            return false;
		}
		$con->close();
	}

	public function buscarUsuarioRegUser(){
		$con = conexion();
        $sql = "SELECT `ID_USU`, `CORREO_USU`, `ALIAS_USU`, `PASS_USU`, `NOM_USU`, `APE_USU`, `TEL_USU`, `FECHA_USU`, `EST_USU` FROM `usuarios` WHERE `ALIAS_USU` = '" .$this->alias."' ";
		if ($resultado = $con->query($sql)) {
			$row_cnt = $resultado->num_rows;
			if($row_cnt==0){
				$con->close();
				return True;
			}else{
				$con->close();
				return false;
			}
        }else{
			$con->close();
            return false;
        }
	}

	public function insertUsu(){
        $con = conexion();
		$sql = "INSERT INTO usuarios (`CORREO_USU`, `ALIAS_USU`, `PASS_USU`, `NOM_USU`, `APE_USU`, `TEL_USU`, `FECHA_USU`, `EST_USU`) VALUES ('".$this->email."', '".$this->alias."' , '".$this->pass."', '".$this->name."', '".$this->surname."', '".$this->cell."', '".$this->date."', '".$this->estado."')";
		if ($con->query($sql)) {
			$con->close();
			return True;
		} else {
			$con->close();
			return $con -> error;
        }
        
	}



	
}
?>