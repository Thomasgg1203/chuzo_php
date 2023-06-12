<?php
//se requiere la conexion
require('../models/Conexion.php');
//Metodo para recolectar los usuarios
function get_usuarios()
{
    //Se va crear una estancia 
    $con1 = new Conexion();
    try {
        $query = $con1->getCon()->query('SELECT * FROM usuarios');
        $usuarios = [];
        //filas
        $num_rows = $query->num_rows;
        
        for ($i = 0; $i < $num_rows; $i++) {
            $fila = $query->fetch_assoc();
            $usuarios[$i] = $fila;
        }
        $con1->closeCon();
        return $usuarios;

    } catch (mysqli_sql_exception $e) {
        // Manejo de la excepción
        // Puedes imprimir un mensaje de error o realizar alguna otra acción
        echo 'Error al obtener los usuarios: ' . $e->getMessage();
        $con1->closeCon();
        return [];
    }
}
//metodo detalle



//Para usar la vista del controlador
// require('ver_usuarios.php');
?>