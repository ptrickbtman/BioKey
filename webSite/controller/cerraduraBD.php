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
    include_once 'conexion2.php';
    //include_once 'conexion.php';

    class cerraduraBD extends cerradura {

        public function desbloquear(){
            $con = conexion2();
            $sql = "SELECT * FROM cerraduras WHERE `COD_CERR`=".$this->cod_cerradura." AND `ID_USU`=".$this->id_usuario_cerradura." ";
            if ($result = $con->query($sql)) {
                if( $result->num_rows == 1 ) {
                    $sql2 = "UPDATE `cerraduras` SET `EST_CERR`=1 WHERE `COD_CERR`=".$this->cod_cerradura." ";
                    if ($result = $con->query($sql2)) {
                        $con->close();
                        $this->pass_cerradura = $sql2;
                        return True;
                    }else{
                        $con->close();
                        return False;
                    }
                }else{
                    $con->close();
                    return False; 
                }
            }else{
                $con->close();
                return False;
            }
        }
        public function bloquear(){
            $con = conexion2(); 
            $sql = "UPDATE `cerraduras` SET `EST_CERR`=0 WHERE `COD_CERR`=".$this->cod_cerradura." ";
            if ($result = $con->query($sql)) {
               echo "-0#Agregado#0-";
            }else{
                $this->fecha_cerradura = $sql;
                echo "-0#error#0-";
            }
        }
        public function actualizarFecha(){
            $con = conexion2(); 
            $sql = "UPDATE `cerraduras` SET `DATE_CERR`='".$this->fecha_cerradura."' WHERE `COD_CERR`=".$this->cod_cerradura." ";
            if ($result = $con->query($sql)) {
                return True;
            }else{
                $this->fecha_cerradura = $sql;
                return False;
            }
        }

        public function desasociarCerradura(){
            $con = conexion2(); 
            $sql = "UPDATE `cerraduras` SET `ID_USU`=NULL,`DATE_CERR`='".$this->fecha_cerradura."',`EST_CERR`=2 WHERE `COD_CERR`=".$this->cod_cerradura." ";
            if ($result = $con->query($sql)) {
                return True;
            }else{
                $this->fecha_cerradura = $sql;
                return False;
            }
        }

        public function buscarCerraduraPorIds(){
            $con = conexion2();
            $sql = "SELECT * FROM cerraduras WHERE  `ID_USU` = ". $this->id_usuario_cerradura . " AND `COD_CERR`= ".$this->cod_cerradura." ";
            if ($result = $con->query($sql)) {
                if( $result->num_rows == 1 ) {
                    return True;
                }else{
                    $con->close();
                    return False; 
                }
            }else{
                $con->close();
                return False;
            }
        }

        public function crearPedidoCerradura(){
            $con = conexion();

            $sql = "INSERT INTO `cerraduras`(`SERIAL_CERR`, `EST_CERR` , `PASS_CERR`, `SSID_RED`,`PASS_RED`) VALUES ('".$this->serial_cerradura."', ".$this->estado_cerradura.", ". $this->crearPassCerradura()." , 'BioKey' , '123123' ) " ;
            if($con->query($sql)){
                $respuesta = $con->insert_id;
            }else{
                $respuesta = 0;
            }
            $this->set_serial_cerradura($sql);
            $con->close();
            return $respuesta;
        }

        public function jsonCerraduraPorId(){
            $con = conexion2();
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
            $con = conexion2();
            $sql = "SELECT * FROM cerraduras WHERE `SERIAL_CERR` = '". $this->serial_cerradura . "' AND (`EST_CERR`=3 OR `EST_CERR`=2)";
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
            $con = conexion2();
            $sql = "UPDATE `cerraduras` SET `ID_USU`= '". $this->id_usuario_cerradura."' , `EST_CERR`= 1 WHERE  `SERIAL_CERR` = '". $this->serial_cerradura . "'";
            if ($resultado = $con->query($sql)) {
                return true;
            }else{
                return false;
            }
        } 

        public function actualizarCerradura(){
            $con = conexion2();
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
            $con = conexion2();

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
            $con = conexion2();
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
            $con = conexion2();
            $sql = "UPDATE `cerraduras` SET `PASS_CERR`='".$this->pass_cerradura."',`DATE_CERR`='".$this->fecha_cerradura."' WHERE `COD_CERR` =".$this->cod_cerradura;
            //$this->set_ssid_cerradura($sql);
            if ($con->query($sql) === true) {
                $con->close();
                return 1;
            } else {
                $con->close();
                return 0;
            }

        }

        public function updateRedCerr(){

            $con = conexion2();

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
            $con = conexion2();
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
            $con = conexion2();
            $sql = "UPDATE `cerraduras` SET `EST_CERR`=1 , `ID_USU`=".$this->id_usuario_cerradura."  WHERE `COD_CERR` =".$this->cod_cerradura." AND `EST_CERR`=3 AND `ID_USU`=''";
            if ($con->query($sql)) {
                $con->close();
                return true;
            } else {
                $con->close();
                return false;
            }
        }




        // metodos

        public function crearPassCerradura(){
            $data = "";
            for($i = 0 ; $i<=5 ; $i++){
                $data .= (String)rand(1,9);                
            }
            return $data;
        }

        public function crearSSID(){
            $data = "BioKey";
            for($i = 0 ; $i=3 ; $i++){
                if($i == 1 && $i ==2){
                    $data .= chr(rand(ord("a"), ord("z")));
                }  else{
                    $data .= (String)rand(1,9);
                }          
            }
            return $data;
        }

        public function crearPassCerraduraWifi(){
            $data = "";
            for($i = 0 ; $i<=5 ; $i++){
                if($i==2 && $i==3){
                    $data .= (String)rand(1,8);
                }else{
                    $data .= (rand(ord("a"), ord("z")));
                }
                
            }
            return $data;
        }
    }


    ?>