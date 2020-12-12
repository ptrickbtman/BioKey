<?php

include '../controller/pedidosBD.php';
session_start();


if(isset($_POST["dataFilter"])/* && $_SESSION["usuario"][4]==2 */){
    $cerradura = new cerraduraBD(null, null, null, null, null, null,null, null);
    $filter = $_POST["dataFilter"];
    $count =0;
    //  0=>estado 1=>serial 2=>id
    $sql = "";
    //print_r($sql);
    if($filter[2]){
        if ($count==0){
            $sql .= " WHERE ";
        }else{
            $sql .= " AND ";
        }
        $sql .= "`COD_CERR`=".$filter[2] ." ";
        $count +=1;
    }
    if($filter[1]){
        if ($count==0){
            $sql .= " WHERE ";
        }else{
            $sql .= " AND ";
        }
        $sql .= "`SERIAL_CERR`='".$filter[1] ."' ";
        $count +=1;
    }
    if($filter[0]){
        if ($count==0){
            $sql .= " WHERE ";
        }else{
            $sql .= " AND ";
        }
        $sql .= "`EST_CERR`=".$filter[0] ." ";
        $count +=1;
    }
    //echo $sql;
    //-2 no cerradura //-1 erro sql 
    echo $sql;
    print_r( $cerradura->buscarCerraduraFiltrado($sql));
    $sql = "";
   
}


if(isset($_POST["pedidos"]) && $_SESSION["usuario"][4]==2 &&$_POST["pedidos"]==1){
    $cerradura = new cerraduraBD(null, null, null, null, null, null,null, null);
    print_r( $cerradura->buscarPedidos());
    //-3 : error de consulta
    // -2 no cerraduras Pedidas
}

?>