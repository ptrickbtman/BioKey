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
    
    include "models/cerraduras.php";
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

        public function actualizarCerradura(){
            $con = conexion();
            $sql = "UPDATE `cerraduras` SET `DATE_CERR`= '". $this->fecha_cerradura."' WHERE  `COD_CERR` = ". $this->cod_cerradura . "";
            if($con->query($sql)){
                $sql = "SELECT `SSID_RED`, `PASS_RED`, `PASS_CERR` FROM cerraduras WHERE `ID_USU` = ".$this->cod_cerradura;
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

            $sql = "SELECT `COD_CERR`, `SERIAL_CERR`, `DATE_CERR`, `EST_CERR`, `SSID_RED` FROM `cerraduras` WHERE `COD_CERR` =".$this->cod_cerradura;
            $datos = $con->query($sql);
            $registro = new cerraduraBD(null, null, null, null, null, null, null, null);
            if ($datos->num_rows > 0) {
                while($reg = $datos->fetch_assoc()) {
                    $registro->set_cod_cerradura($reg["COD_CERR"]);
                    $registro->set_serial_cerradura($reg["SERIAL_CERR"]);
                    $registro->set_fecha_cerradura($reg["DATE_CERR"]);
                    $registro->set_estado_cerradura($reg["EST_CERR"]);
                    $registro->set_ssid_cerradura($reg["SSID_RED"]);
                }
            } else {
                $registro = "error";
            }  
            return $registro; 
        }

        public function updateContraseñaCerr(){

            $con = conexion();

            $sql = "UPDATE `cerraduras` SET `PASS_CERR`=".$this->pass_cerradura.",`DATE_CERR`='".$this->fecha_cerradura."' WHERE `COD_CERR` =".$this->cod_cerradura;

            if ($con->query($sql) === true) {
                $con->close();
                return true;
            } else {
                $con->close();
                return false;
            }

        }

        public function updateRedCerr(){

            $con = conexion();

            $sql = "UPDATE `cerraduras` SET `DATE_CERR`='".$this->fecha_cerradura."', `SSID_RED`='".$this->ssid_cerradura."',`PASS_RED`='".$this->passRed_cerradura."' WHERE `COD_CERR` =".$this->cod_cerradura;
            
            if ($con->query($sql) === true) {
                $con->close();
                return true;
            } else {
                $con->close();
                return false;
            }
        }
    }


    ?>