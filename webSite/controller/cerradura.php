<?php 
/*
    variables:
    protected $cod_cerradura;
    protected $id_usuario_cerradura;
    protected $id_wifi_cerradura;
    protected $fecha_cerradura;
    protected $estado_cerradura;
    funciones get_ && set_ + variable

*/


include "../models/cerraduras.php";
include 'conexion.php';

class cerraduraBD extends cerradura {
    
    public function validarCerradura(){
        $con = conexion();
        $sql = "SELECT * FROM cerraduras WHERE `EST_CERR`= 4 AND `COD_CERR` = ". $this->cod_cerradura . "";
        if ($resultado = $con->query($sql)) {
            $row_cnt = $resultado->num_rows;
            if($row_cnt==1){
                return True;
            }
        }else{
            return False;
        }
    }


    public function cambiarUsuarioEstadoCerradura(){
        $con = conexion();
        $sql = "UPDATE `cerraduras` SET `ID_USU`= '". $this->id_usuario_cerradura."' , `EST_CERR`= 3 WHERE  `COD_CERR` = ". $this->cod_cerradura . "";
        if ($resultado = $con->query($sql)) {
            return true;
        }else{
            return false;
        }
    }   
}


?>