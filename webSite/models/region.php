<?php

class region{
	protected $id_region;
	protected $nom_region;
	protected $est_log_region;

	function __construct($id_region,$nom_region, $est_log_region){
		$this->id_region = $id_region;
		$this->nom_region = $nom_region;
		$this->est_log_region = $est_log_region;
	}

	function get_id_region()
	{
		return $this->id_region;
	}

	function set_id_region($i)
	{
		$this->id_region = $i;
	}

	function get_nom_region()
	{
		return $this->nom_region;
	}

	function set_nom_region($i)
	{
		$this->nom_region = $i;
	}

	function get_est_log_region()
	{
		return $this->est_log_region;
	}

	function set_est_log_region($i)
	{
		$this->est_log_region = $i;
	}


}

?>