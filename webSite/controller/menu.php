<?php

session_start();

// fin login
function DesplegarMenu() {
    $data = 1;
    if(isset($_SESSION["clienteBiokey"])){
        $data = 0;
    }
    include 'view/menu.php';
}
    







?>