<?php

include "../models/usuarios.php";
include 'conexion.php';


class usuariosDB extends usuario {
	
	//*** login accesss.php en ajax */

	public function accessUsu(){
		$con = conexion();
		$sql = "SELECT `ID_USU`, `ALIAS_USU`, `CORREO_USU`, `NOM_USU` , `APE_USU`  ,`PASS_USU`, `EST_USU`  FROM usuarios WHERE";
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
					$this->set_email($dataQueryPass['CORREO_USU']);
					$this->set_name($dataQueryPass['NOM_USU']);
					$this->set_estado($dataQueryPass['EST_USU']);
					$this->set_pass("");
					$con->close();
					return True;
				
				}else{
					$con->close();
					return False;
				}
			
		}else{
			$con->close();
			return False;
		}
	}




	public function modificarEstadoUsuario(){
		$con = conexion();
        $sql = "UPDATE `usuarios` SET `EST_USU`= '". $this->estado ."' WHERE  `ID_USU` = ". $this->id . "";
		if ($resultado = $con->query($sql)) {
			$con->close();
			return true;
        }else{
			$con->close();
            return false;
        }
	}
	
	// insertar usuario validando..
	// validando usuario registradooo para insertar

	public function buscarUsuarioRegEmail(){
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
			return False;
        }   
	}

	public function setPassByIdUser(){
		$con = conexion();
		$sql = "UPDATE `usuarios` SET `PASS_USU`='".$this->pass."' WHERE `ID_USU`=".$this->id."";
		if ($con->query($sql)) {
			$con->close();
			return True;
		} else {
			$con->close();
			$this->alias = $sql;
			return False;
        }   
	}

	public function setCellByIdUser(){
		$con = conexion();
		$sql = "UPDATE `usuarios` SET `TEL_USU`='".$this->cell."' WHERE `ID_USU`=".$this->id."";
		if ($con->query($sql)) {
			$con->close();
			return True;
		} else {
			$con->close();
			$this->alias = $sql;
			return False;
        }  
	}
}
?>