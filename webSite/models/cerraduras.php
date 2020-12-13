<?php
class cerradura
{   
    protected $cod_cerradura;
    protected $id_usuario_cerradura;
    protected $serial_cerradura;
    protected $pass_cerradura;
    protected $fecha_cerradura;
    protected $estado_cerradura;
    protected $ssid_cerradura;
    protected $passRed_cerradura;
    

    public function __construct($cod_cerradura, $id_usuario_cerradura, $serial_cerradura, $pass_cerradura, $fecha_cerradura, $estado_cerradura,$ssid_cerradura, $passRed_cerradura){
        $this->cod_cerradura = $cod_cerradura;
        $this->id_usuario_cerradura = $id_usuario_cerradura;
        $this->serial_cerradura = $serial_cerradura;
        $this->pass_cerradura = $pass_cerradura;
        $this->fecha_cerradura = $fecha_cerradura;
        $this->estado_cerradura = $estado_cerradura;
        $this->ssid_cerradura = $ssid_cerradura;
        $this->passRed_cerradura = $passRed_cerradura;
    }

    function get_passRed_cerradura()
    {
        return $this->passRed_cerradura;
    }

    function set_passRed_cerradura($i)
    {
        $this->passRed_cerradura = $i;
    }

    function get_cod_cerradurar()
    {
        return $this->cod_cerradura;
    }

    function set_cod_cerradura($i)
    {
        $this->cod_cerradura = $i;
    }

    function get_ssid_cerradura()
    {
        return $this->ssid_cerradura;
    }

    function set_ssid_cerradura($i)
    {
        $this->ssid_cerradura = $i;
    }

    function get_id_usuario_cerradura()
    {
        return $this->id_usuario_cerradura;
    }

    function set_id_usuario_cerradura($i)
    {
        $this->id_usuario_cerradura = $i;
    }

    function get_pass_cerradura()
    {
        return $this->pass_cerradura;
    }

    function set_pass_cerradura($i)
    {
        $this->pass_cerradura = $i;
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
    function get_serial_cerradura()
    {
        return $this->serial_cerradura;
    }

    function set_serial_cerradura($i)
    {
        $this->serial_cerradura = $i;
    }
}



function crearPassCerraduraWifi(){

}

?>