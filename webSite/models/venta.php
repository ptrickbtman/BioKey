<?php  
class venta
{
	protected $id_vent;
	protected $cod_cerradura;
	protected $id_bol;
	protected $subtot_vent;
	protected $est_log_vent;

	function __construct($id_vent, $cod_cerradura, $id_bol, $subtot_vent, $est_log_vent)
	{
		$this->id_vent = $id_vent;
		$this->cod_cerradura = $cod_cerradura;
		$this->id_bol = $id_bol;
		$this->subtot_vent = $subtot_vent;
		$this->est_log_vent = $est_log_vent;
	}

	function set_id_vent($i)
	{
		$this->id_vent = $i;
	}

	function get_id_vent()
	{
		return $this->id_vent;
	}

	function set_cod_cerradura($i)
	{
		$this->cod_cerradura = $i;
	}

	function get_cod_cerradura()
	{
		return $this->cod_cerradura;
	}

	function set_id_bol($i)
	{
		$this->id_bol = $i;
	}

	function get_id_bol()
	{
		return $this->id_bol;
	}

	function set_subtot_vent($i)
	{
		$this->subtot_vent = $i;
	}

	function get_subtot_vent()
	{
		return $this->subtot_vent;
	}

	function set_est_log_vent($i)
	{
		$this->est_log_vent = $i;
	}

	function get_est_log_vent()
	{
		return $this->est_log_vent;
	}
}
?>