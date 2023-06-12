<?php
class Conexion{
    private $con;

    //constructor para la conexion
    public function __construct()
    {
    // Se crea cuando se genera la clase
    try {
        $this->con = new mysqli('localhost', 'root', '', 'chuzo');
    } catch (mysqli_sql_exception $e) {
        echo 'Error de conexión: ' . $e->getMessage();
    }
    }
    function getCon(){
        return $this->con;
    }

    //cerrar conexion
    function closeCon(){
        $this->con = null;
    } 
}
//SELECT * FROM usuarios WHERE usu_email = 'tgiraldo@gmail.com' AND usu_contrasenia = 't12345'
?>