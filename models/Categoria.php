<?php
class Categoria{
    private $id;
    private $nombre;
    private $descripcion;
    //Constructor
    public function __construct($id, $nom, $des){
        $this->id = $id;
        $this->nombre = $nom;
        $this->descripcion = $des;
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