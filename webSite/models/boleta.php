<?php

class boleta{
    protected $id_bol;
    protected $id_metpag;
    protected $cant_env_bol;
    protected $orden_bol;
    protected $total_bol;
    protected $fecha_bol;
    protected $est_log_bol;

    function __construct ($id_bol , $id_metpag , $cant_env_bol, $orden_bol , $total_bol , $fecha_bol,$rut_cliente, $est_log_bol){
        $this->id_bol = $id_bol;
        $this->id_metpag = $id_metpag;
        $this->cant_env_bol = $cant_env_bol;
        $this->orden_bol = $orden_bol;
        $this->total_bol = $total_bol;
        $this->fecha_bol = $fecha_bol;
        $this->rut_cliente = $rut_cliente;
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

    function get_cant_env_bol()
    {
        return $this->cant_env_bol ;
    }

    function get_orden_bol()
    {
        return $this->orden_bol ;
    }

    function get_total_bol()
    {
        return $this->total_bol ;
    }

    function get_fecha_bol()
    {
        return $this->fecha_bol ;
    } 

    function get_rut_cliente()
    {
        return $this->rut_cliente ;
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

    function set_cant_env_bol($i)
    {
        $this->cant_env_bol = $i;
    }

    function set_orden_bol($i)
    {
        $this->orden_bol = $i;
    }
    
    function set_total_bol($i)
    {
        $this->total_bol = $i;
    }

    function set_fecha_bol($i)
    {
        $this->fecha_bol = $i;
    }
    function set_rut_cliente($i)
    {
        $this->rut_cliente = $i;
    }
    
    function set_est_log_bol($i)
    {
        $this->est_log_bol = $i;
    }



}

?>