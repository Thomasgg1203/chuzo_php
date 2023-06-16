<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // El usuario no ha iniciado sesión, redirigir a la página de inicio de sesión
    echo "<script>window.location.href = 'index.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Link CSS-->
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <!--Titulo-->
    <title>Menu || Chuzo</title>
</head>
<body class="body">
    <!--Inicio Navbar-->
    <nav>
        <div class="navbar-1">
            <ul class="menu">
                <li class="flex-container">
                    <img src="img/logo-ingreso.svg" width="30" height="30" class="menu-logo">
                    <a href="#"><?php echo $_SESSION['nombre'];?></a>
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
                    <a href="#">Ordenes</a>
                </li>
                <hr>
                <li class="flex-container">
                    <img src="img/categoria-navbar.svg" width="30" height="30" class="menu-logo">
                    <a href="#">Categoria</a>
                </li>
                <hr>
                <li class="flex-container">
                    <img src="img/vender-navbar.svg" width="30" height="30" class="menu-logo">
                    <a href="#">Vender</a>
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
            <img src="img/logo-menu.svg" width="150px" height="150px">
        </div>
    </div>
    <div class="container-registro">
        <div class="flex-item fontype">
            <h1 class="title">
                MENU
            </h1>
        </div>
    </div>
    <!--Fin del logotipo ingreso-->

    <!--Parte del carrucel-->
    <div class="centrado">
        <div class="container-img">
            <div class="mySlides">
                <img src="img/carrucel-1.jpg">
            </div>
            <div class="mySlides">
                <img src="img/carrucel-2.jpg">
            </div>
            <div class="mySlides">
                <img src="img/carrucel-3.jpg">
            </div>
            
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
    
            <div class="elements">
                <span class="quadrate" onclick="currentSlide(1)"></span>
                <span class="quadrate" onclick="currentSlide(2)"></span>
                <span class="quadrate" onclick="currentSlide(3)"></span>
            </div>
        </div>
    </div>
    <!--fin del carrucel-->

    <!--Todos los botones-->
    <div class="btn-menu">
        <div>
            <a href="tabla_usuarios.php">
                <button class="botones-principales">
                    <img src="img/btn-usuarios.svg" width="40" height="40">
                    <h4>
                        Usuarios&nbsp;&nbsp;
                    </h4>
                </button>
            </a>
        </div>
        <div>
            <a href="tabla_productos.php">
                <button class="botones-principales">
                    <img src="img/btn-productos.svg" width="40" height="40">
                    <h4>
                        Productos&nbsp;
                    </h4>
                </button>
            </a>
        </div>
        <div>
            <a href="#">
                <button class="botones-principales">
                    <img src="img/btn-categoria.svg" width="40" height="40">
                    <h4>
                        Categorias
                    </h4>
                </button>
            </a>
        </div>
        <div>
            <a href="#">
                <button class="botones-principales">
                    <img src="img/btn-ordenes.svg" width="40" height="40">
                    <h4>
                        Ordenes&nbsp;&nbsp;&nbsp;
                    </h4>
                </button>
            </a>
        </div>
        <div>
            <a href="#">
                <button class="botones-principales">
                    <img src="img/btn-vender.svg" width="40" height="40">
                    <h4>
                        Vender&nbsp;&nbsp;&nbsp;&nbsp;
                    </h4>
                </button>
            </a>
        </div>
    </div>
    <!--Fin de los botones-->
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