<?php
require('../models/Conexion.php');

//obtener categorias
function get_categoria(){
    $con2 = new Conexion();
    try{
        $query = $con2->getCon()->query('SELECT * FROM categorias');
        $categorias = [];
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
function detalles_cate($id){
    $categoria = get_categoria();
    // Variable detalles
    $deta = [];
    foreach($categoria as $c){
        if($id == $c['cate_id']){
            $deta = $c;
            break;
        }
    }
    return $deta;
}
function crear_categoria($nom, $desc){
    $con = new Conexion();
    try{
        $query = "INSERT INTO categorias(cate_nombre, cate_descripcion) VALUES ('$nom','$desc')";
        // Ejecutar la consulta
        $con->getCon()->query($query);
        // Cerrar la conexión
        $con->closeCon();
        //retornar respuesta
        return true;
    }catch(mysqli_sql_exception $e){
        echo "Error al crear una categoria: ".$e->getMessage();
        $con->closeCon();
        return false;
    }
}
function actualizar_categoria($id, $nom, $desc){
    $con = new Conexion();
    try{
        $query = "UPDATE categorias SET cate_nombre = '$nom',cate_descripcion ='$desc' WHERE cate_id = '$id'";
        // Ejecutar la consulta
        $con->getCon()->query($query);
        // Cerrar la conexión
        $con->closeCon();
        //retornar respuesta
        return true;
    }catch(mysqli_sql_exception $e){
        echo "Error al crear una categoria: ".$e->getMessage();
        $con->closeCon();
        return false;
    }
}
function eliminar_categoria($id){
    $con = new Conexion();
    try{
        $query = "DELETE FROM categorias WHERE cate_id = '$id'";
        
        // Ejecutar la consulta
        $con->getCon()->query($query);
        
        // Cerrar la conexión
        $con->closeCon();
        //retornar respuesta
        return true;
    }catch(mysqli_sql_exception $e){
        echo "Error al eliminar categorias: ".$e->getMessage();
        $con->closeCon();
        return false;
    }
}
?>