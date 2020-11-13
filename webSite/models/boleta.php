<?php
include "cliente.php";

class boleta extends cliente {
    protected $id_bol;
    protected $id_metpag;
    protected $id_metenv;
    protected $total_bol;
    protected $fecha_bol;
    protected $est_log_bol;

    function __construct ($id_bol , $id_metpag , $id_metenv , $total_bol , $fecha_bol,$rut_cliente,$nom_cliente,$ape_cliente,$corr_cliente, $est_log_bol){
        $this->id_bol = $id_bol;
        $this->id_metpag = $id_metpag;
        $this->id_metenv = $id_metenv;
        $this->total_bol = $total_bol;
        $this->fecha_bol = $fecha_bol;
        $this->rut_cliente = $rut_cliente;
        $this->nom_cliente = $nom_cliente;
        $this->ape_cliente = $ape_cliente;
        $this->corr_cliente = $corr_cliente;
        $this->est_log_bol = $est_log_bol;
    }

    



    function get_id_bol()
    {
       return $this->id_bol ;
    }

    function get_id_metpag()
    {
        return $this->id_metpag ;
    }

    function get_id_metenv()
    {
        return $this->id_metenv ;
    }
/*
    function get_rut_cli_bol()
    {
        return $this->rut_cli ;
    }
*/
    function get_total_bol()
    {
        return $this->total_bol ;
    }

    function get_fecha_bol()
    {
        return $this->fecha_bol ;
    } 
    function get_est_log_bol()
    {
        return $this->est_log_bol ;
    }

    



    function set_id_bol($i)
    {
        $this->id_bol = $i;
    }

    function set_id_metpag($i)
    {
        $this->id_metpag = $i;
    }

    function set_id_metenv($i)
    {
        $this->id_metenv = $i;
    }
/*
    function set_rut_cli_bol($i)
    {
        $this->rut_cli = $i;
    }
*/
    function set_total_bol($i)
    {
        $this->total_bol = $i;
    }

    function set_fecha_bol($i)
    {
        $this->fecha_bol = $i;
    }
    function set_est_log_bol($i)
    {
        $this->est_log_bol = $i;
    }



}

?>