<?php  

class registroCerradura
{
	protected $id_registro_cerr;
	protected $cod_cerradura;
	protected $id_tipo_reg;
	protected $descripcion_registro_cerr;
	protected $fecha_registro_cerr;


	function __construct($id_registro_cerr, $cod_cerradura, $id_tipo_reg, $descripcion_registro_cerr, $fecha_registro_cerr)
	{
		$this->id_registro_cerr = $id_registro_cerr;
        $this->cod_cerradura = $cod_cerradura;
        $this->id_tipo_reg = $id_tipo_reg;
        $this->descripcion_registro_cerr = $descripcion_registro_cerr;
        $this->fecha_registro_cerr = $fecha_registro_cerr;
	}

	function get_id_registro_cerr()
    {
        return $this->id_registro_cerr;
    }

    function set_id_registro_cerr($i)
    {
        $this->cod_cerradura = $i;
    }

    function get_cod_cerradurar()
    {
        return $this->cod_cerradura;
    }

    function set_cod_cerradura($i)
    {
        $this->cod_cerradura = $i;
    }

    function get_id_tipo_reg()
    {
        return $this->id_tipo_reg;
    }

    function set_id_tipo_reg($i)
    {
        $this->id_tipo_reg = $i;
    }

    function get_descripcion_registro_cerr()
    {
        return $this->descripcion_registro_cerr;
    }

    function set_descripcion_registro_cerr($i)
    {
        $this->descripcion_registro_cerr = $i;
    }

    function get_fecha_registro_cerr()
    {
        return $this->fecha_registro_cerr;
    }

    function set_fecha_registro_cerr($i)
    {
        $this->fecha_registro_cerr = $i;
    }

}
?>