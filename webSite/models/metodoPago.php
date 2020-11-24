<?php  

class metodoPago 
{
	protected $id_menEnv;
    protected $nom_menEnv;
    protected $est_log_menEnv;
	
	function __construct($id_menEnv,$nom_menEnv,$est_log_menEnv)
	{
		$this->id_menEnv = $id_menEnv;
        $this->nom_menEnv = $nom_menEnv;
        $this->est_log_menEnv = $est_log_menEnv;
	}

	function get_id_menEnv(){
        return $this->id_menEnv;
    }

    function set_id_menEnv($i){
        $this->id_menEnv = $i;
    }

    function get_nom_menEnv(){
        return $this->nom_menEnv;
    }

    function set_nom_menEnv($i){
        $this->nom_menEnv = $i;
    }

    function get_est_log_menEnv(){
        return $this->est_log_menEnv;
    }

    function set_est_log_menEnv($i){
        $this->est_log_menEnv = $i;
    }
    
}
?>