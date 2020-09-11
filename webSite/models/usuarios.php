<?php 


class usuario
{   
    protected $id;
    protected $email;
    protected $alias;
    protected $pass;
    protected $name;
    protected $surname;
    protected $cell;
    protected $date;
    protected $estado;
    protected $hora;
    
    public function __construct($id, $email , $alias, $pass, $name, $surname, $cell , $date, $estado , $hora)
    {
        $this->id = $id;
        $this->email = $email;
        $this->alias = $alias;
        $this->pass = $pass;
        $this->name = $name;
        $this->surname = $surname;
        $this->cell = $cell;
        $this->date = $date;
        $this->estado = $estado;
        $this->hora = $$hora;
    }
    function get_id_user()
    {
        return $this->id;
    }

    function set_id_user($id)
    {
        $this->id = $id;
    }

    function get_email()
    {
        return $this->email;
    }

    function set_email($email)
    {
        $this->email = $email;
    }

    function get_alias()
    {
        return $this->alias;
    }

    function set_alias($alias)
    {
        $this->alias = $alias;
    }
    
    function get_pass()
    {
        return $this->pass;
    }

    function set_pass($t)
    {
        $this->pass = $t;
    }

    function get_name()
    {
        return $this->name;
    }

    function set_name($t)
    {
        $this->name = $t;
    }

    function get_surname()
    {
        return $this->surname;
    }

    function set_surname($t)
    {
        $this->surname = $t;
    }


    function get_cell()
    {
        return $this->cell;
    }

    function set_cell($t)
    {
        $this->cell = $t;
    }

    function get_date()
    {
        return $this->date;
    }

    function set_date($t)
    {
        $this->date = $t;
    }

    function get_estado()
    {
        return $this->estado;
    }

    function set_estado($t)
    {
        $this->estado = $t;
    }

    function get_hora()
    {
        return $this->hora;
    }

    function set_hora($t)
    {
        $this->hora = $t;
    }




}

?>