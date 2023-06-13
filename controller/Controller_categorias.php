<?php
require('../models/Conexion.php');

function get_categoria(){
    $con2 = new Conexion();
    try{
        $query = $con2->getCon()->query('SELECT * FROM categorias');
        //Crear array productos
        $categorias = [];
        //filas
        $num_rows = $query->num_rows;

        for ($i = 0; $i < $num_rows; $i++) {
            $fila = $query->fetch_assoc();
            $categorias[$i] = $fila;
        }
        $con2->closeCon();
        return $categorias;
    }catch(mysqli_sql_exception $e){
        echo "Error al consultar categorias".$e->getMessage();
        $con2->closeCon();
        return [];
    }
}


?>