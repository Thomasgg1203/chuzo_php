<?php
class Usuario
{
    //atributos
    private $id;
    private $documento;
    private $nombre;
    private $apellido;
    private $email;
    private $contrasenia;
    private $admin;
    //Constructor
    public function __construct($id, $doc, $nom, $ape, $email, $con, $adm)
    {
        $this->id = $id;
        $this->documento = $doc;
        $this->nombre = $nom;
        $this->apellido = $ape;
        $this->email = $email;
        $this->contrasenia = $con;
        $this->admin = $adm;
    }

    //Metodo get
    public function __get($name)
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        }
        return null;
    }
    //metodo set
    public function __set($name, $val)
    {
        if (property_exists($this, $name)) {
            $this->name = $val;
        }
    }
}
?>