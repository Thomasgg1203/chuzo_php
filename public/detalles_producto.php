<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Link CSS-->
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <!--Titulo-->
    <title>Chuzo || Detalles Producto</title>
</head>

<body class="body">
    <!--Parte del codigo php-->
    <?php
    require('../controller/Controller_productos.php');
    //Mensaje de error por si pasa algo
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    //fin
    //Toma del id necesario para llenar datos
    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $producto = detalle_producto($id);
    }else{
        echo "No se pudo tomar el id";
    }
    //Fin de mensaje
    ?>
    <!--Fin php-->
    <!--Inicio Navbar-->
    <nav>
        <div class="navbar-1">
            <ul class="menu">
                <li class="flex-container">
                    <img src="img/logo-ingreso.svg" width="30" height="30" class="menu-logo">
                    <a href="detalles_perfil.php"><?php echo $_SESSION['nombre']; ?></a>
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
                <img src="img/logo-navbar-hamburguer.svg" height="50" width="50" onclick="Menu()"
                    class="logo-navbar-hamburguer">
                <img class="logo-menu" src="img/logo.svg" alt="" width="70" height="70">
            </div>
        </div>
    </nav>
    <!--Fin Navbar-->

    <!--Parte del logotipo ingreso-->
    <div class="container-registro">
        <div class="flex-item">
            <img src="img/producto-navbar.svg" width="150px" height="150px">
        </div>
    </div>
    <div class="container-registro">
        <div class="flex-item fontype">
            <h1 class="title">
                DETALLES PRODUCTOS
            </h1>
        </div>
    </div>
    <!--Fin del logotipo ingreso-->
    <!--Detalles del producto-->
    <div class="container-detalles">
        <div>
            <p>
               <b>Identificador:</b> <?php echo $producto['prod_id']; ?>
            </p>
            <hr>
            <p>
               <b>Categoria:</b> <?php echo $producto['prod_cate_id']."--".$producto['cate_nombre']; ?>
            </p>
            <hr>
            <p>
                <b>Nombre:</b> <?php echo $producto['prod_nombre']; ?>
            </p>
            <hr>
            <p>
                <b>Precio:</b> <?php echo $producto['prod_precio']; ?>
            </p>
        </div>
    </div>
    <!--Fin detalles productos-->
    <br>
    <!--Botones-->
    <div class="container">
        <div class="btns-form">
            <a href="tabla_productos.php">
                <button type="button" class="btn-form">
                    Regresar
                </button>
            </a>
        </div>
    </div>
    <!--Fin Botones-->

    <br>
    <!--Parte del footer-->
    <footer class="footer">
        <div class="logo-section">
            <div>
                <img src="img/Logo-blanco-footer.svg" alt="Logo" class="logo">
            </div>
        </div>
        <div class="text-section">
            <h2>Chuzo</h2>
            <h4>&copy; CopyRight</h4>
            <h4>Thomas Giraldo García</h4>
        </div>
        <div class="icon-section">
            <img src="img/facebook-footer.svg" alt="Icono 1" class="icon">
            <img src="img/Whatsapp-footer.svg" alt="Icono 2" class="icon">
            <img src="img/Instagram-footer.svg" alt="Icono 3" class="icon">
        </div>
    </footer>
    <!--Fin footer-->
    <script src="js/navbar.js"></script>
</body>

</html>