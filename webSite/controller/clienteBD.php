<?php 

include "../models/cliente.php";
include_once 'conexion.php';

class clienteBD extends cliente {

    public function insertarClienteVenta(){
        $con = conexion();
        $sql = "INSERT INTO `clientes`(`RUT_CLI`, `NOM_CLI`, `APE_CLI`, `CORR_CLI`, `TEL_CLI`,`EST_LOG_CLI`) VALUES ('".$this->rut_cliente."', '".$this->nom_cliente."', '".$this->ape_cliente."', '".$this->corr_cliente."', '".$this->tel_cliente."', ".$this->est_log_cliente.")";
        if($con->query($sql)){
            $respuesta = 1;
        }else{
            $respuesta = 0;
        }

        $con->close();
        return $respuesta;
    } 

    public function updateClienteVenta(){
        $con = conexion();
        $sql = "UPDATE `clientes` SET `NOM_CLI` = '".$this->nom_cliente."', `APE_CLI` = '".$this->ape_cliente."', `CORR_CLI` = '".$this->corr_cliente."', `TEL_CLI` ='".$this->tel_cliente."' WHERE `RUT_CLI`='".$this->rut_cliente."'";
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