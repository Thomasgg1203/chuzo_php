<?php
require('../models/Conexion.php');

//Obtener ordenes
function obtener_ordenes()
{
    $con = new Conexion();
    try {
        $query = $con->getCon()->query('SELECT o.ord_id, o.ord_pro_id, p.prod_nombre, o.ord_usu_id, u.usu_nombre, o.cantidad, o.ord_fecha FROM ordenes_producto as o JOIN usuarios as u ON u.usu_id = o.ord_usu_id JOIN productos as p ON p.prod_id = o.ord_pro_id');
        $ordenes = [];
        //filas
        $num_rows = $query->num_rows;

        for ($i = 0; $i < $num_rows; $i++) {
            $fila = $query->fetch_assoc();
            $ordenes[$i] = $fila;
        }
        $con->closeCon();
        return $ordenes;

    } catch (mysqli_sql_exception $e) {
        echo 'Error al obtener las ordenes: ' . $e->getMessage();
        $con->closeCon();
        return [];
    }
}
//Detalles de la orden
function detalles_ordenes($id){
    $ordenes = obtener_ordenes();
    // Variable detalles
    $deta = [];
    foreach($ordenes as $orde){
        if($id == $orde['ord_id']){
            $deta = $orde;
            break;
        }
    }
    return $deta;
}
//vender (crear orden)
function vender($prod, $usu, $cant, $fecha){
    $con = new Conexion();
    try{
        $query = "INSERT INTO ordenes_producto(ord_pro_id, ord_usu_id, cantidad, ord_fecha) VALUES ('$prod','$usu','$cant','$fecha')";
        // Ejecutar la consulta
        $con->getCon()->query($query);
        // Cerrar la conexión
        $con->closeCon();
        //retornar respuesta
        return true;
    }catch(mysqli_sql_exception $e){
        echo "Error al crear una orden: ".$e->getMessage();
        $con->closeCon();
        return false;
    }
}
//obtener productos
function get_productos(){
    //creamos una instancia de la conexion
    $con = new Conexion();
    //validar la información
    try{
        $query = $con->getCon()->query('SELECT p.prod_id, p.prod_cate_id, p.prod_nombre, p.prod_precio, c.cate_nombre FROM productos AS p JOIN categorias AS c ON c.cate_id = p.prod_cate_id ORDER BY p.prod_id ASC');
        //Crear array productos
        $productos = [];
        //filas
        $num_rows = $query->num_rows;

        for ($i = 0; $i < $num_rows; $i++) {
            $fila = $query->fetch_assoc();
            $productos[$i] = $fila;
        }
        $con->closeCon();
        return $productos;
    }catch(mysqli_sql_exception $e){
        echo "Error al consultar productos".$e->getMessage();
        $con->closeCon();
        return [];
    }
}
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
?>