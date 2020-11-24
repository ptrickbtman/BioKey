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
    
    require_once "../models/cerraduras.php";
    include_once 'conexion.php';

    class cerraduraBD extends cerradura {

        public function jsonCerraduraPorId(){
            $con = conexion0();
            $jsondata = array();
            $sql = "SELECT * FROM cerraduras WHERE  `ID_USU` = ". $this->id_usuario_cerradura . "";
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


        public function validarCerradura(){
            $con = conexion();
            $sql = "SELECT * FROM cerraduras WHERE `EST_CERR`= 4 AND `SERIAL_CERR` = '". $this->serial_cerradura . "'";
            $this->set_estado_cerradura($sql);
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
            $sql = "UPDATE `cerraduras` SET `ID_USU`= '". $this->id_usuario_cerradura."' , `EST_CERR`= 1 WHERE  `SERIAL_CERR` = '". $this->serial_cerradura . "'";
            if ($resultado = $con->query($sql)) {
                return true;
            }else{
                return false;
            }
        } 

        public function actualizarCerradura(){
            $con = conexion();
            $sql = "UPDATE `cerraduras` SET `DATE_CERR`= '". $this->fecha_cerradura."' WHERE  `COD_CERR` = ". $this->cod_cerradura . "";
            if($con->query($sql)){
                $sql = "SELECT `SSID_RED`, `PASS_RED`, `PASS_CERR` FROM cerraduras WHERE `COD_CERR` = ".$this->cod_cerradura;
                $datos = $con->query($sql);
                $registros;
                if ($datos->num_rows > 0) {
                    while($reg = $datos->fetch_assoc()) {
                        $registros = $reg["SSID_RED"].",".$reg["PASS_RED"].";".$reg["PASS_CERR"];
                    }

                } else {
                    $registros = "error";
                }
            }else{
                $registros = "error";
            }

            $con->close();
            return $registros;
        } 

        public function selectCerradurasDeUsuario(){
            $con = conexion();

            $sql = "SELECT `COD_CERR`, `SERIAL_CERR`, `DATE_CERR`, `EST_CERR`, `SSID_RED` FROM `cerraduras` WHERE `ID_USU` =".$this->id_usuario_cerradura;
            $datos = $con->query($sql);
            $registros = array();
            if ($datos->num_rows > 0) {
                while($reg = $datos->fetch_assoc()) {
                    array_push($registros, new cerraduraBD($reg["COD_CERR"], null, $reg["SERIAL_CERR"], null, $reg["DATE_CERR"], $reg["EST_CERR"],$reg["SSID_RED"], null));
                }
            } else {
                $registros = "error";
            }  
            return $registros; 
        }

        public function selectCerradura(){
            $con = conexion();
            $jsondata = array();
            $sql = "SELECT `COD_CERR`, `SERIAL_CERR`, `DATE_CERR`, `EST_CERR`, `SSID_RED` FROM `cerraduras` WHERE `COD_CERR` =".$this->cod_cerradura;
            if ($result = $con->query($sql)) {
                if( $result->num_rows > 0 ) {
                    while( $row = $result->fetch_object() ) {
                        array_push($jsondata, $row);
                    }
                    $con->close();
                    return $jsondata;
                }

            }else{
                $con->close();
                return 'Error';
            } 
        }


        public function updateContraseñaCerr(){

            $con = conexion();

            $sql = "UPDATE `cerraduras` SET `PASS_CERR`=".$this->pass_cerradura.",`DATE_CERR`='".$this->fecha_cerradura."' WHERE `COD_CERR` =".$this->cod_cerradura;

            if ($con->query($sql) === true) {
                $con->close();
                return 1;
            } else {
                $con->close();
                return 0;
            }

        }

        public function updateRedCerr(){

            $con = conexion();

            $sql = "UPDATE `cerraduras` SET `DATE_CERR`='".$this->fecha_cerradura."', `SSID_RED`='".$this->ssid_cerradura."',`PASS_RED`='".$this->passRed_cerradura."' WHERE `COD_CERR` =".$this->cod_cerradura;
            
            if ($con->query($sql) === true) {
                $con->close();
                return 1;
            } else {
                $con->close();
                return 0;
            }
        }

        public function buscarCerraduraSerialValidar(){
            $con = conexion();
            $sql = "SELECT * FROM `cerraduras` WHERE SERIAL_CERR='".$this->serial_cerradura."' ";
            if ($resultado = $con->query($sql)) {
                $row_cnt = $resultado->num_rows;

                if($row_cnt==1){
                    $fila = mysqli_fetch_row($resultado);
                    $this->cod_cerradura = $fila[0];
                    $this->estado_cerradura = 1;
                    $con->close();
                    return True;
                }else{
                    $con->close();
                    return False;
                }
            }
        }

        public function validarCerraduraPorId(){
            $con = conexion();
            $sql = "UPDATE `cerraduras` SET `EST_CERR`=1 , `ID_USU`=".$this->id_usuario_cerradura."  WHERE `COD_CERR` =".$this->cod_cerradura." AND `EST_CERR`=3 AND `ID_USU`=''";
            if ($con->query($sql)) {
                $con->close();
                return true;
            } else {
                $con->close();
                return false;
            }
        }
    }


    ?>