<link rel="stylesheet" href="styles/style.css">
<script src="js/navbar.js"></script>
<?php
require('../controller/Controller_categorias.php');
$id_el = $_POST['btn-eliminar'];
?>
<!--Parte de la alerta-->
<div id="alertBox" class="alert-box">
    <div class="alert-content">
        <a href="tabla_categorias.php"><span class="close-btn" onclick="closeAlert()">&times;</span></a>
        <h2>
            ¿Desea eliminar esta categoria?
        </h2>
        <p>Si elimina esta categoria, eliminara todo producto que la tenga, ¿esta seguro?</p>
        <div class="btns-form-alerta">
            <form method="post">
                <button type="submit" class="btn-form" name="eliminar" value="<?php echo $id_el; ?>" onclick="closeAlert()">
                    Eliminar
                </button>
            </form>
            <a href="tabla_categorias.php">
                <button type="button" onclick="closeAlert()" class="btn-form-cancelar">
                    Cancelar
                </button>
            </a>
        </div>
    </div>
</div>
<!--Fin de la alerta-->
    <!--codigo para borrar un producto-->
    <?php
    if (isset($_POST['eliminar'])) {
        $id_el = $_POST['eliminar'];
        if (eliminar_categoria($id_el) == true) {
            echo '<script> 
                alert("Se elimino con exito");
                closeAlert();
                window.location.replace("tabla_categorias.php");
                </script>';
        } else {
            echo '<script>alert("No se pudo eliminar la categoria");
            window.location.replace("tabla_categorias.php");</script>';
        }
    }
    ?>
    <!--Fin-->