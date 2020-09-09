<?php

session_start();
//session_destroy();
// fin login
function DesplegarMenu() {
    $data = 1;
    if(isset($_SESSION["clienteBiokey"])){
        $data = 0;
    }
    include 'view/menu.php';
}
?>