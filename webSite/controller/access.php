<?php
// login
if (isset($_POST['loginAccess']) && !empty($_POST['loginAccess'])){
    $data = $_POST['loginAccess'];
    // datos del usuario 
    if (!empty($data["user"]) &&  !empty($data["passUser"]) ){
        include  "conexion.php";
        include "validacionTxtNumEmail.php";
        $conexion = conexion();
        $sql = "SELECT `ID_USU`,`PASS_USU`,`EST_USU`  FROM `usuarios` WHERE";
        if (validarEmail($data["user"])){   
            $sql .= "`CORREO_USU`= '" . $data["user"] ."' ";
        }else{
            $sql .= "`ALIAS_USU`= '". $data["user"] ."' ";
        }
    //echo $sql;
        $result = $conexion->query($sql);
        if ($result->num_rows == 1) {
            while($row = $result->fetch_assoc() ) {
                //echo  $row["PASS_USU"];
                if ($row["PASS_USU"] == $data["passUser"] ){
                    session_start();
                    session_regenerate_id();
                    if ($_SESSION['clienteBiokey']){
                        $user =  $_SESSION["clienteBiokey"];
                    }
                    ///////// datos del usuario  //////////
                    $user[0] = $row["ID_USU"];
                    $user[1] = $row["EST_USU"];
                    $_SESSION["clienteBiokey"] = $user;
                    print_r($_SESSION["clienteBiokey"]);
                    echo 1;
                }
            }
        }
    }
}
?>