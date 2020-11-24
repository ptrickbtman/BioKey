<?php
include 'metodoPago.php';
class direccion extends metodoPago{

    protected $id_dir;
    protected $id_bol;
    protected $id_region;
    protected $id_ciu;
    protected $comuna_dir;
    protected $calle1_dir;
    protected $calle2_dir;
    protected $num_dir;
    protected $villa_dir;
    protected $block_dir;
    protected $est_log_dir;

    function __construct ($id_dir,$id_bol,$id_region,$id_ciu,$comuna_dir,$calle1_dir,$calle2_dir,$num_dir,$villa_dir,$block_dir, $est_log_dir){
        $this->id_dir = $id_dir;
        $this->id_bol = $id_bol;
        $this->id_region = $id_region;
        $this->comuna_dir = $comuna_dir;
        $this->calle1_dir = $calle1_dir;
        $this->calle2_dir = $calle2_dir;
        $this->num_dir = $num_dir;
        $this->villa_dir = $villa_dir;
        $this->block_dir = $block_dir;
        $this->est_log_dir = $est_log_dir;

    }

    function get_id_dir(){
        return $this->id_dir;
    }
    function get_id_bol(){
        return $this->id_bol;
    }
    function get_id_region(){
        return $this->id_region;
    }
    function get_comuna_dir(){
        return $this->comuna_dir;
    }
    function get_calle1_dir(){
        return $this->calle1_dir;
    }
    function get_calle2_dir(){
        return $this->calle2_dir;
    }
    function get_num_dir(){
        return $this->num_dir;
    }
    function get_villa_dir(){
        return $this->villa_dir;
    }
    function get_block_dir(){
        return $this->block_dir;
    }
    function get_est_log_dir(){
        return $this->est_log_dir;
    }

    function set_id_dir($data){
        $this->id_dir = $data;
    }

    function set_id_bol($data){
        $this->id_bol = $data;
    }

    function set_id_region($data){
        $this->id_region = $data;
    }
    function set_comuna_dir($data){
        $this->comuna_dir = $data;
    }
    function set_calle1_dir($data){
        $this->calle1_dir = $data;
    }
    function set_calle2_dir($data){
        $this->calle2_dir = $data;
    }
    function set_num_dir($data){
        $this->num_dir = $data;
    }
    function set_villa_dir($data){
        $this->villa_dir = $data;
    }
    function set_block_dir($data){
        $this->block_dir = $data;
    }
     function set_est_log_dir($data){
        $this->est_log_dir = $data;
    }

    
}


?>
