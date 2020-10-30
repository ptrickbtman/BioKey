<?php

class cliente{
    protected $rut_cliente;
    protected $nom_cliente;
    protected $ape_cliente;
    protected $corr_cliente;

    function __construct($rut_cliente,$nom_cliente,$ape_cliente,$corr_cliente){
        $this->rut_cliente = $rut_cliente;
        $this->nom_cliente = $nom_cliente;
        $this->ape_cliente = $ape_cliente;
        $this->corr_cliente = $corr_cliente;
    }

    function set_rut_cliente($rut)
    {
        $this->rut_cliente = $rut;
    }

    function get_rut_cliente()
    {
        return $this->rut_cliente;
    }

    function set_nom_cliente($nom)
    {
        $this->nom_cliente = $nom;
    }

    function get_nom_cliente()
    {
        return $this->nom_cliente;
    }

    function set_ape_cliente($ape)
    {
        $this->ape_cliente = $ape;
    }

    function get_ape_cliente()
    {
        return $this->ape_cliente;
    }

    function set_corr_cliente($email)
    {
        $this->corr_cliente = $email;
    }

    function get_corr_cliente()
    {
        return $this->corr_cliente;
    }

}

?>