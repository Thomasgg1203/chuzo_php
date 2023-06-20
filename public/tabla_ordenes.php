<!DOCTYPE html>
<html lang="es">
<?php
    session_start();
    // Verificar si el usuario ha iniciado sesión
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        // El usuario no ha iniciado sesión, redirigir a la página de inicio de sesión
        echo "<script>window.location.href = 'index.php';</script>";
    }
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Link CSS-->
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <!--Titulo-->
    <title>Chuzo || Tabla Ordenes</title>
</head>

<body class="body">
    <!--LLamado del controlador-->
    <?php
    //Mensaje de error por si pasa algo:
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    //Fin de mensaje de error
    //ruta controlador
    require('../controller/Controller_ordenes.php');
    //Relleno del array productos
    $ordenes = obtener_ordenes();
    ?>
    <!--Fin del llamado controllador-->
        <!--Inicio Navbar-->
        <nav>
        <div class="navbar-1">
            <ul class="menu">
                <li class="flex-container">
                    <img src="img/logo-ingreso.svg" width="30" height="30" class="menu-logo">
                    <a href="detalles_perfil.php?id=<?php echo $_SESSION['usu_id']; ?>"><?php echo $_SESSION['nombre'];?></a>
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
            <img src="img/ordenes-navbar.svg" width="150px" height="150px">
        </div>
    </div>
    <div class="container-registro">
        <div class="flex-item fontype">
            <h1 class="title">
                INFORMACIÓN ORDENES
            </h1>
        </div>
    </div>
    <!--Fin del logotipo ingreso-->

    <!--Tabla ordenes-->
    <div class="container">
        <table>
            <tr>
                <th colspan="3">Ordenes Productos</th>
            </tr>
            <!--Parte codigo php-->
            <?php
            //relleno de datos usuarios
            foreach ($ordenes as $orde) {
                echo '<tr>';
                echo "<td>" . $orde['ord_id'] . "</td>";
                echo "<td>" . $orde['prod_nombre'] . "</td>";
                ?>
                <td class="dropdown">
                    <button class="btn-menu-crud">
                        <img src="img/btn---.svg" width="20" height="20">
                    </button>
                    <div class="dropdown-content">
                        <a href="detalles_orden.php?id=<?php echo $orde['ord_id']; ?>">Detalles</a>
                    </div>
                </td>
                <?php
                echo '</tr>';
            }
            ?>
            <!--Fin codigo-->
        </table>
    </div>
    <!--Fin tabla ordenes-->
    <br>
    <!--Botones-->
    <div class="container">
        <div class="btns-form">
            <a href="menu.php">
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
            <img src="img/facebook-footer.svg" class="icon">
            <img src="img/Whatsapp-footer.svg" class="icon">
            <img src="img/Instagram-footer.svg" class="icon">
        </div>
    </footer>
    <!--Fin footer-->
    <script src="js/navbar.js"></script>
</body>

</html>