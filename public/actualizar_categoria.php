<!DOCTYPE html>
<html lang="es">
<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require('../controller/Controller_categorias.php');
session_start();
// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // El usuario no ha iniciado sesión, redirigir a la página de inicio de sesión
    echo "<script>window.location.href = 'index.php';</script>";
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$cate = detalles_cate($id);
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Link CSS-->
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <title>Chuzo || Actualizar Categoria</title>
</head>

<body class="body">
    <!--Inicio Navbar-->
    <nav>
        <div class="navbar-1">
            <ul class="menu">
                <li class="flex-container">
                    <img src="img/logo-ingreso.svg" width="30" height="30" class="menu-logo">
                    <a href="detalles_perfil.php"><?php echo $_SESSION['nombre'];?></a>
                </li>
                <hr>
                <li class="flex-container">
                    <img src="img/producto-navbar.svg" width="30" height="30" class="menu-logo">
                    <a href="tabla_productos.php">Productos</a>
                </li>
                <hr>
                <li class="flex-container">
                    <img src="img/usuarios-navbar.svg" width="30" height="30" class="menu-logo">
                    <a href="tabla_usuarios.php">Usuarios</a>
                </li>
                <hr>
                <li class="flex-container">
                    <img src="img/ordenes-navbar.svg" width="30" height="30" class="menu-logo">
                    <a href="tabla_ordenes.php">Ordenes</a>
                </li>
                <hr>
                <li class="flex-container">
                    <img src="img/categoria-navbar.svg" width="30" height="30" class="menu-logo">
                    <a href="tabla_categorias.php">Categoria</a>
                </li>
                <hr>
                <li class="flex-container">
                    <img src="img/vender-navbar.svg" width="30" height="30" class="menu-logo">
                    <a href="vender.php">Vender</a>
                </li>
                <hr>
                <li class="flex-container">
                    <img src="img/salir-navbar.svg" width="30" height="30" class="menu-logo">
                    <a href="index.php">Salir</a>
                </li>
                <hr>
            </ul>
            <div class="hamburger">
                <img src="img/logo-navbar-hamburguer.svg" height="50" width="50" onclick="Menu()" class="logo-navbar-hamburguer">
                <img class="logo-menu" src="img/logo.svg" alt="" width="70" height="70">
            </div>
        </div>
    </nav>
    <!--Fin Navbar-->

    <!--Parte del logotipo ingreso-->
    <div class="container-registro">
        <div class="flex-item">
            <img src="img/categoria-navbar.svg" width="150px" height="150px">
        </div>
    </div>
    <div class="container-registro">
        <div class="flex-item fontype">
            <h1 class="title">
                ACTUALIZAR CATEGORIA
            </h1>
        </div>
    </div>
    <!--Fin del logotipo ingreso-->

    <!--Formulario-->
    <div class="container">
        <form method="post">
            <div class="title-form">
                <h3 class="title-h4">Nombre Categoria</h3>
            </div>
            <div>
                <input class="input" type="text" class="input-with-logo" name="nomb" required maxlength="30" value="<?php echo $cate['cate_nombre']; ?>">
            </div>
            <div class="title-form">
                <h3 class="title-h4">Descripción Categoria</h3>
            </div>
            <div>
                <input class="input" type="text" class="input-with-logo" name="desc" style="height: 100px;" value="<?php echo $cate['cate_descripcion']; ?>">
            </div>
            <br><br>
            <div class="btns-form">
                <button type="submit" class="btn-form" name="enviar">Actualizar</button>
                <a href="tabla_categorias.php"><button type="button" class="btn-form">Regresar</button></a>
            </div>
        </form>
    </div>
    <!--Fin formulario-->
    <!--Parte de envio de datos-->
    <?php
    if(isset($_POST['enviar'])){
        $nom = $_POST['nomb'];
        $desc = $_POST['desc'];
        if(actualizar_categoria($id, $nom, $desc)){
            echo "<script>alert('Se actualizo correctamente')</script>";
            echo "<script>window.location.href = 'tabla_categorias.php';</script>";
        }else{
            echo "<script>alert('No se pudo actualizar correctamente')</script>";
        }
    }
    ?>
    <!--Fin de envio de datos-->
    <br>
    <!--Parte del footer-->
    <footer class="footer">
        <div class="logo-section">
            <div>
                <img src="img/Logo-blanco-footer.svg" class="logo">
            </div>
        </div>
        <div class="text-section">
            <h2>Chuzo</h2>
            <h4>&copy; CopyRight</h4>
            <h4>Thomas Giraldo García</h4>
        </div>
        <div class="icon-section">
            <img src="img/facebook-footer.svg" class="icon">
            <img src="img/Whatsapp-footer.svg" class="icon">
            <img src="img/Instagram-footer.svg" class="icon">
        </div>
    </footer>
    <!--Fin footer-->
    <script src="js/navbar.js"></script>
</body>

</html>