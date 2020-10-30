<?php

include "validarRut.php";
//include '../controller/clienteBD.php';
include '../controller/boletaBD.php';


$rut = "19.931.127-1";
$nom = "test1";
$ape = "test1";
$email = "test1@gmail.com";
$id_metopago = 1;
$id_metoenvio = 1;
$total = 68000;
$date = date("m-d-y");



// Se deben pbtener los datos a traves de post para ser el isset , ejemp: isset($_POST["rut_cliente"])

if(isset($rut) && isset($rut) && isset($ape) && isset($email) ){
    if (validarRut($rut)){
        echo "Rut validado";
        
        $boletaBD = new boletaBD(null,null,null,null,null,null,null,null,null,null);
        
        $boletaBD->set_rut_cliente($rut);
        $boletaBD->set_nom_cliente($nom);
        $boletaBD->set_ape_cliente($ape);
        $boletaBD->set_corr_cliente($email);
    
        print_r($boletaBD);
        
        if($boletaBD->insertCli()){
            echo "Cliente insertado";
            

            $boletaBD->set_id_metpag(1);
            $boletaBD->set_id_metenv(1);
            $boletaBD->set_total_bol($total);
            $boletaBD->set_fecha_bol($date);
            echo "<br>";
            if($boletaBD->insertBol()){
                echo "boleta insertada";
            }else{
                echo "Boleta no insertada";
            }
            
        }else{
            echo "Cliente no insertado";
        }
        
        
    }else{
        echo "Rut no valido";
    }
}else{
    echo "faltan datos";
}









?>