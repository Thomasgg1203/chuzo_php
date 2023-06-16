<?php
require('../models/Conexion.php');

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
//funcion para crear
function crear_producto($nombre_prod, $precio_prod, $cate_prod){
    $con = new Conexion();
    try{
        $query = "INSERT INTO productos(prod_cate_id, prod_nombre, prod_precio) VALUES ('$cate_prod', '$nombre_prod', '$precio_prod')";
        // Ejecutar la consulta
        $con->getCon()->query($query);
        // Cerrar la conexión
        $con->closeCon();
        //retornar respuesta
        return true;
    }catch(mysqli_sql_exception $e){
        echo "Error al crear un producto: ".$e->getMessage();
        $con->closeCon();
        return false;
    }
}

//Buscar producto para detalles
    function detalle_producto($id){
    $productos = get_productos();
    // Variable detalles
    $deta = [];
    foreach($productos as $prod){
        if($id == $prod['prod_id']){
            $deta = $prod;
            break;
        }
    }
    return $deta;
}
//Llenar categorias
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
function actualizar_producto($id, $nombre, $precio, $cate_prod){
    $con = new Conexion();
    try{
        $query = "UPDATE productos SET prod_nombre = '$nombre', prod_precio = '$precio', prod_cate_id = '$cate_prod' WHERE prod_id = '$id'";
        
        // Ejecutar la consulta
        $con->getCon()->query($query);
        
        // Cerrar la conexión
        $con->closeCon();
        //retornar respuesta
        return true;
    }catch(mysqli_sql_exception $e){
        echo "Error al actualizar producto: ".$e->getMessage();
        $con->closeCon();
        return false;
    }
}
function eliminar_producto($id){
    $con = new Conexion();
    try{
        $query = "DELETE FROM productos WHERE prod_id = '$id'";
        
        // Ejecutar la consulta
        $con->getCon()->query($query);
        
        // Cerrar la conexión
        $con->closeCon();
        //retornar respuesta
        return true;
    }catch(mysqli_sql_exception $e){
        echo "Error al actualizar producto: ".$e->getMessage();
        $con->closeCon();
        return false;
    }
}
?>