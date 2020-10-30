<?php

class ciudad{
    protected $id_ciudad;
    protected $nom_ciudad;
 
    function __construct($id_ciudad,$nom_ciudad){
        $this->id_ciudad = $id_ciudad;
        $this->nom_ciudad = $nom_ciudad;
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
}

?>