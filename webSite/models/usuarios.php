<?php 


class usuario
{
    protected $email;
    protected $alias;
    protected $pass;
    protected $name;
    protected $surname;
    protected $cell;
    protected $date;
    protected $estado;
    
    public function __construct($email , $alias, $pass, $name, $surname, $cell , $date, $estado)
    {
        $this->email = $email;
        $this->alias = $alias;
        $this->pass = $pass;
        $this->surname = $name;
        $this->cell = $surname;
        $this->date = $cell;
        $this->estado = $estado;
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

}

?>