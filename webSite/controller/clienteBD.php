<?php 

include "../models/cliente.php";
include 'conexion.php';

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

    public function actualizarClienteVenta(){
        $con = conexion();
        $sql = "INSERT INTO `clientes`(`RUT_CLI`, `NOM_CLI`, `APE_CLI`, `CORR_CLI`, `TEL_CLI`,`EST_LOG_CLI`) VALUES ('".$this->rut_cliente."', '".$this->nom_cliente."', '".$this->ape_cliente."', '".$this->corr_cliente."', '".$this->tel_cliente."', ".$this->est_log_cliente.")";
        $sql = "UPDATE `clientes` SET `NOM_CLI` = '".$this->rut_cliente."', `APE_CLI` '".$this->rut_cliente."', `CORR_CLI`, `TEL_CLI`,`EST_LOG_CLI`)";
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