<?php

include "../../models/boleta.php";
include_once 'conexion.php';
/*protected $id_bol;
    protected $id_metpag;
    protected $cant_env_bol;
    protected $orden_bol;
    protected $total_bol;
    protected $fecha_bol;
    protected $est_log_bol; */
    class boletaBD extends boleta
    {
        public function verAllBoletas(){
            $con = conexion();
            $jsondata = array();
            $sql = "SELECT * FROM `boletas` ORDER BY `ID_BOL` DESC";
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

    public function verAIdBoletas(){
        $con = conexion();
        $jsondata = array();
        $sql = "SELECT * FROM `boletas` WHERE `ID_BOL`=".$this->id_bol;
        $this->total_bol = $sql;
        if ($result = $con->query($sql)) {
            if( $result->num_rows == 1 ) {
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

    public function anularVenta(){
        $con = conexion(); 
        $sql = "UPDATE `boletas` SET `EST_LOG_BOL`= 0 WHERE `ID_BOL`=".$this->id_bol." ";
        if ($result = $con->query($sql)) {
            $con->close();
            return 1;
        }else{
            $con->close();
            $this->fecha_cerradura = $sql;
            return -2;  
        }
    }

    public function deshacerAnul(){
        $con = conexion(); 
        $sql = "UPDATE `boletas` SET `EST_LOG_BOL`= 1 WHERE `ID_BOL`=".$this->id_bol." ";
        if ($result = $con->query($sql)) {
            $con->close();
            return 1;
        }else{
            $con->close();
            $this->fecha_cerradura = $sql;
            return -2;  
        }
    }
    
}

?>
