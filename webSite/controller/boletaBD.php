<?php 
/*
    protected $rut_cliente;
    protected $nom_cliente;
    protected $ape_cliente;
    protected $corr_cliente;

*/


    include "../models/boleta.php";
    include 'conexion.php';

    class boletaBD extends boleta {
       
        function insertBol() {
            $conn = conexion();
            $sql = "INSERT INTO `boletas`(`ID_METPAG`, `ID_METENV`, `RUT_CLI`, `TOT_BOL`, `FECH_BOL`) VALUES ('".$this->get_id_metpag(). "' , '".$this->get_id_metenv(). "' , '".$this->get_rut_cliente(). "' , '".$this->get_total_bol(). "' , '".$this->get_fecha_bol(). "')";
            if ($conn->query($sql)) {
                $conn->close();
                return True;
            }else{
                return False;
            }  
        }

        function insertCli() {
            $conn = conexion();
            if(!empty($this->get_rut_cliente()) && !empty($this->get_nom_cliente())  && !empty($this->get_ape_cliente()) && !empty($this->get_corr_cliente())  ){
                $sql = "INSERT INTO `clientes`(`RUT_CLI`, `NOM_CLI`, `APE_CLI`, `CORR_CLI`) VALUES ('".$this->get_rut_cliente()."', '".$this->get_nom_cliente()."' , '".$this->get_ape_cliente()."' , '".$this->get_corr_cliente()."')";
                if ($conn->query($sql)) {
                    $conn->close();
                    return True;
                }else{
                    return False;
                }
            }else{
                return False;
            }
        }
    }


    ?>