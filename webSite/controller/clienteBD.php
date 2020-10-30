<?php 
/*
    protected $rut_cliente;
    protected $nom_cliente;
    protected $ape_cliente;
    protected $corr_cliente;

*/


    include "../models/cliente.php";
    //include 'conexion.php';

    class clienteBD extends cliente {
       
        /*function insertCli() {
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
        }*/


        
    }


    ?>