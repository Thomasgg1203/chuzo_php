<?php
require('../models/Conexion.php');
require('../models/Categoria.php');

class categoriaController{
    private $conexion;
    public function __construct(){
        $this->conexion = new Conexion();
    }
    //Para enlistar
    public function obtenerCategorias() {
        try {
            $query = $this->conexion->getCon()->query('SELECT * FROM categorias');
            $categorias = [];
            $num_rows = $query->num_rows;
    
            for ($i = 0; $i < $num_rows; $i++) {
                $fila = $query->fetch_assoc();
                $categoria = new Categoria($fila['cate_id'], $fila['cate_nombre'], $fila['cate_descripcion']);
                $categorias[] = $categoria;
            }
            return $categorias;
        } catch (mysqli_sql_exception $e) {
            echo "Error al consultar categorías: " . $e->getMessage();
            return [];
        }
    }
    //Buscar uno en especifico
    public function detallesCategoria($id){
        $categorias = $this->obtenerCategorias();
        $categoriaEncontrada = null;
        
        foreach($categorias as $categoria){
            if($id == $categoria->id){
                $categoriaEncontrada = $categoria;
                break;
            }
        }
        
        return $categoriaEncontrada;
    }
    //Funcion para eliminar
    public function eliminarCategoria($id) {
        try {
            $query = "DELETE FROM categorias WHERE cate_id = '$id'";
            $this->conexion->getCon()->query($query);
            return true;
        } catch (mysqli_sql_exception $e) {
            echo "Error al eliminar categoría: " . $e->getMessage();
            return false;
        }
    }
    //Funcion para actualizar
    public function actualizarCategoria($id, $nombre, $descripcion) {
        try {
            $query = "UPDATE categorias SET cate_nombre = '$nombre', cate_descripcion = '$descripcion' WHERE cate_id = '$id'";
            $this->conexion->getCon()->query($query);
            return true;
        } catch (mysqli_sql_exception $e) {
            echo "Error al actualizar categoría: " . $e->getMessage();
            return false;
        }
    }
    //funcion para crear
    public function crearCategoria($nombre, $descripcion) {
        try {
            $query = "INSERT INTO categorias(cate_nombre, cate_descripcion) VALUES ('$nombre', '$descripcion')";
            
            // Ejecutar la consulta
            $this->conexion->getCon()->query($query);
            
            // Retornar respuesta
            return true;
        } catch (mysqli_sql_exception $e) {
            echo "Error al crear una categoría: " . $e->getMessage();
            return false;
        }
    }
    //Funcion para cerrar la conexion
    public function cerrarConexion(){
        $this->conexion->closeCon();
    }
}
?>