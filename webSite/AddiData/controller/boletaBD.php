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
		$sql = "SELECT * FROM `boletas` WHERE 1";
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