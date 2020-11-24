<?php
class cliente{
    protected $rut_cliente;
    protected $nom_cliente;
    protected $ape_cliente;
    protected $corr_cliente;
    protected $tel_cliente;
    protected $est_log_cliente;

    function __construct($rut_cliente,$nom_cliente,$ape_cliente,$corr_cliente,$tel_cliente, $est_log_cliente){
        $this->rut_cliente = $rut_cliente;
        $this->nom_cliente = $nom_cliente;
        $this->ape_cliente = $ape_cliente;
        $this->corr_cliente = $corr_cliente;
        $this->tel_cliente = $tel_cliente;
        $this->est_log_cliente = $est_log_cliente;
    }

    function set_rut_cliente($i)
    {
        $this->rut_cliente = $i;
    }

    function get_rut_cliente()
    {
        return $this->rut_cliente;
    }

    function set_nom_cliente($i)
    {
        $this->nom_cliente = $i;
    }

    function get_nom_cliente()
    {
        return $this->nom_cliente;
    }

    function set_ape_cliente($i)
    {
        $this->ape_cliente = $i;
    }

    function get_ape_cliente()
    {
        return $this->ape_cliente;
    }

    function set_corr_cliente($i)
    {
        $this->corr_cliente = $i;
    }

    function get_corr_cliente()
    {
        return $this->corr_cliente;
    }

    function set_tel_cliente($i)
    {
        $this->tel_cliente = $i;
    }

    function get_tel_cliente()
    {
        return $this->tel_cliente;
    }

    function set_est_log_cliente($i)
    {
        $this->est_log_cliente = $i;
    }

    function get_est_log_cliente()
    {
        return $this->est_log_cliente;
    }

}

?>