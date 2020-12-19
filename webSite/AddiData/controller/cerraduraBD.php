<?php

include "../../models/cerraduras.php";
include_once 'conexion.php';

class cerraduraBD extends cerradura
{

    public function cerraduraPorId(){
        $con = conexion();
        $jsondata = array();
        $sql = "SELECT * FROM cerraduras WHERE  `COD_CERR` = ". $this->cod_cerradura . "";
        if ($result = $con->query($sql)) {
            if( $result->num_rows > 0 ) {
                while( $row = $result->fetch_object() ) {
                    array_push($jsondata, $row);
                }
                return json_encode($jsondata);
            }
        }else{
            $con->close();
            return False;
        }
    }


	public function buscarPedidos(){
        $con = conexion();
        $jsondata = array();
		$sql = "SELECT `COD_CERR`, `ID_USU`, `SERIAL_CERR`, `PASS_CERR`, `DATE_CERR`, `EST_CERR`, `SSID_RED`, `PASS_RED` FROM `cerraduras` WHERE 1";
        if ($result = $con->query($sql)) {
            if( $result->num_rows > 0 ) {
                while( $row = $result->fetch_object() ) {
					array_push($jsondata, $row);
                }
                $con->close();
				return json_encode($jsondata);
            }else{
                $con->close();
                return -2; // no cerradiras
            }
        }else{
            $con->close();
            return -3; // consulta error
        }
    } 
    
    public function buscarCerraduraFiltrado($sql){
        $con = conexion();
        $jsondata = array();
        $sql = "SELECT `COD_CERR`, `ID_USU`, `SERIAL_CERR`, `PASS_CERR`, `DATE_CERR`, `EST_CERR`, `SSID_RED`, `PASS_RED` FROM `cerraduras`" . $sql;
        if ($result = $con->query($sql)) {
            if( $result->num_rows > 0 ) {
                while( $row = $result->fetch_object() ) {
					array_push($jsondata, $row);
                }
                $con->close();
				return json_encode($jsondata);
            }else{
                $con->close();
                return -2; // no cerradiras
            }
        }else{
            $con->close();
            return -3; // consulta error
        }
    }
}

?>