<?php 
class Produto{
    private $id;
    private $categoria;
    private $nombre;
    private $precio;

    //constructor
    public function __construct($id, $cate, $nom, $pre){
        $this->id = $id;
        $this->categoria = $cate;
        $this->nombre = $nom;
        $this->precio = $pre;
    }
    //Metodos
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