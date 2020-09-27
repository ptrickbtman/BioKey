<?php
class cerradura
{   
    protected $cod_cerradura;
    protected $id_usuario_cerradura;
    protected $id_wifi_cerradura;
    protected $fecha_cerradura;
    protected $estado_cerradura;

    public function __construct($cod_cerradura, $id_usuario_cerradura, $id_wifi_cerradura, $fecha_cerradura, $estado_cerradura){
        $this->cod_cerradura = $cod_cerradura;
        $this->id_usuario_cerradura = $id_usuario_cerradura;
        $this->id_wifi_cerradura = $id_wifi_cerradura;
        $this->fecha_cerradura = $fecha_cerradura;
        $this->estado_cerradura = $estado_cerradura;
    }

    function get_cod_cerradurar()
    {
        return $this->cod_cerradura;
    }

    function set_cod_cerradura($i)
    {
        $this->cod_cerradura = $i;
    }

    function get_id_usuario_cerradura()
    {
        return $this->id_usuario_cerradura;
    }

    function set_id_usuario_cerradura($i)
    {
        $this->id_usuario_cerradura = $i;
    }

    function get_id_wifi_cerradura()
    {
        return $this->id_wifi_cerradura;
    }

    function set_id_wifi_cerradura($i)
    {
        $this->id_wifi_cerradura = $i;
    }

    function get_fecha_cerradura()
    {
        return $this->fecha_cerradura;
    }

    function set_fecha_cerradura($i)
    {
        $this->fecha_cerradura = $i;
    }

    function get_estado_cerradura()
    {
        return $this->estado_cerradura;
    }

    function set_estado_cerradura($i)
    {
        $this->estado_cerradura = $i;
    }
}

?>