<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Link CSS-->
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <title>Chuzo ||Tabla Usuarios</title>
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
                    <a href="#">Perfil</a>
                </li>
                <hr>
                <li class="flex-container">
                    <img src="img/producto-navbar.svg" width="30" height="30" class="menu-logo">
                    <a href="#">Productos</a>
                </li>
                <hr>
                <li class="flex-container">
                    <img src="img/usuarios-navbar.svg" width="30" height="30" class="menu-logo">
                    <a href="registro.html">Usuarios</a>
                </li>
                <hr>
                <li class="flex-container">
                    <img src="img/ordenes-navbar.svg" width="30" height="30" class="menu-logo">
                    <a href="registro.html">Ordenes</a>
                </li>
                <hr>
                <li class="flex-container">
                    <img src="img/categoria-navbar.svg" width="30" height="30" class="menu-logo">
                    <a href="registro.html">Categoria</a>
                </li>
                <hr>
                <li class="flex-container">
                    <img src="img/vender-navbar.svg" width="30" height="30" class="menu-logo">
                    <a href="registro.html">Vender</a>
                </li>
                <hr>
                <li class="flex-container">
                    <img src="img/salir-navbar.svg" width="30" height="30" class="menu-logo">
                    <a href="registro.html">Salir</a>
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
                <th colspan="3">Usuarios</th>
            </tr>
            <?php
            //relleno de datos usuarios
            foreach ($usuarios as $user) {
                echo '<tr>';
                echo "<td>" . $user['usu_id'] . "</td>";
                echo "<td>" . $user['usu_documento'] . "</td>";
            ?>
                <td class="dropdown">
                    <button class="btn-menu-crud">
                        <img src="img/btn---.svg" width="20" height="20">
                    </button>
                    <div class="dropdown-content">
                        <a href="detalles_producto.html" id="<?php echo $user['usu_id']; ?>">Detalles</a>
                        <a href="#">Actualizar</a>
                        <a href="#" onclick="showAlert()">Eliminar</a>
                    </div>
                </td>
            <?php
                echo '</tr>';
            }
            ?>
        </table>
    </div>
    <!--Fin tabla productos-->
        <!--Parte de la alerta-->
        <div id="alertBox" class="alert-box">
        <div class="alert-content">
            <span class="close-btn" onclick="closeAlert()">&times;</span>
            <h2>
                ¿Desea eliminar este producto?
            </h2>
            <p>Si elimina este producto, no podra volver a encontrarlo en la tabla</p>
            <div class="btns-form-alerta">
                <a href="">
                    <button type="button" class="btn-form">
                        Eliminar
                    </button>
                </a>
                <a href="#">
                    <button type="button" onclick="closeAlert()" class="btn-form-cancelar">
                        Cancelar
                    </button>
                </a>
            </div>
        </div>
    </div>
    <!--Fin de la alerta-->
    <br>
    <!--Botones-->
    <div class="container">
        <div class="btns-form">
            <a href="#">
                <button type="button" class="btn-form">
                    Crear Producto
                </button>
            </a>
            <a href="menu.html">
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