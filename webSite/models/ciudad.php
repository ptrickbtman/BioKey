<?php

class ciudad{
    protected $id_ciudad;
    protected $nom_ciudad;
    protected $est_log_ciudad;
 
    function __construct($id_ciudad,$nom_ciudad, $est_log_ciudad){
        $this->id_ciudad = $id_ciudad;
        $this->nom_ciudad = $nom_ciudad;
        $this->est_log_ciudad = $est_log_ciudad;
    }

    function get_id_ciudad()
    {
        return $this->id_ciudad;
    }

    function set_id_ciudad($id)
    {
        $this->id_ciudad = $id;
    }

    function get_nom_ciudad()
    {
        return $this->nom_ciudad;
    }

    function set_nom_ciudad($i)
    {
        $this->nom_ciudad = $i;
    } 
    function get_est_log_ciudad()
    {
        return $this->est_log_ciudad;
    }

    function set_est_log_ciudad($i)
    {
        $this->est_log_ciudad = $i;
    }
}

?>