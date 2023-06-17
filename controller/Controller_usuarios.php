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
function crear_usuario($doc, $nom, $ape, $email, $cont){
    $con = new Conexion();
    try{
        $query = "INSERT INTO usuarios(usu_documento, usu_nombre, usu_apellido, usu_email, usu_contrasenia) 
        VALUES ('$doc','$nom','$ape','$email','$cont')";
        // Ejecutar la consulta
        $con->getCon()->query($query);
        // Cerrar la conexión
        $con->closeCon();
        //retornar respuesta
        return true;
    }catch(mysqli_sql_exception $e){
        echo "Error al crear un usuario: ".$e->getMessage();
        $con->closeCon();
        return false;
    }
}

//Buscar producto para detalles
function detalles_usuario($id){
    $usuarios = get_usuarios();
    // Variable detalles
    $deta = [];
    foreach($usuarios as $us){
        if($id == $us['usu_id']){
            $deta = $us;
            break;
        }
    }
    return $deta;
}
?>