<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();
// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // El usuario no ha iniciado sesión, redirigir a la página de inicio de sesión
    echo "<script>window.location.href = 'index.php';</script>";
}
if($_SESSION['estado'] == 0){
    echo "<script>alert('No eres admin')</script>";
    echo "<script>window.location.href = 'index.php';</script>";    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Link CSS-->
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <title>Chuzo || Tabla Usuarios</title>
</head>
<body class="body">
        <!--El archivo que se requiere-->
        <?php
        require('../controller/Controller_usuarios.php');
        //llenar datos
        //consumir metodo de recibir usuarios
        $usuarios = get_usuarios();
        ?>
        <!--fin archivo-->
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
                    <a href="#">Usuarios</a>
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
            <img src="img/usuarios-navbar.svg" width="150px" height="150px">
        </div>
    </div>
    <div class="container-registro">
        <div class="flex-item fontype">
            <h1 class="title">
                INFORMACIÓN USUARIOS
            </h1>
        </div>
    </div>
    <!--Fin del logotipo ingreso-->
    <!--Tabla productos-->
    <div class="container">
        <table>
            <tr>
                <th colspan="4">Usuarios</th>
            </tr>
            <?php
            //relleno de datos usuarios
            foreach ($usuarios as $user) {
                echo '<tr>';
                echo "<td>" . $user['usu_id'] . "</td>";
                echo "<td>" . $user['usu_documento'] . "</td>";
                echo "<td>" . $user['usu_nombre'] . "</td>";
            ?>
                <td class="dropdown">
                    <button class="btn-menu-crud">
                        <img src="img/btn---.svg" width="20" height="20">
                    </button>
                    <div class="dropdown-content">
                    <a href="detalles_usuario.php?id=<?php echo $user['usu_id']; ?>">Detalles</a>
                        <a href="actualizar_usuario.php?id=<?php echo $user['usu_id']; ?>">Actualizar</a>

                        <form method="post" action="eliminar_usuario.php">
                            <button type="submit" href="#?id="<?php echo $user['usu_id']; ?>"
                                value="<?php echo $user['usu_id']; ?>" name="btn-eliminar" class="btn-sin-estilo">
                                Eliminar
                            </button>
                        </form>
                    </div>
                </td>
            <?php
                echo '</tr>';
            }
            ?>
        </table>
    </div>
    <br>
    <!--Botones-->
    <div class="container">
        <div class="btns-form">
            <a href="crear_usuario.php">
                <button type="button" class="btn-form">
                    Crear usuario
                </button>
            </a>
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