<?php
class Orden{
    private $id_ord;
    private $id_prod;
    private $id_usua;
    private $cantidad;
    private $fecha;

    //contructor
    public function __construct(){

    }
    // metodos get y set
    public function __get($name)
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        }
        return null;
    }
    public function __set($name, $val)
    {
        if (property_exists($this, $name)) {
            $this->name = $val;
        }
    }
}
?>