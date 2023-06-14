<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Link CSS-->
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <!--Titulo-->
    <title>Tabla Productos || Chuzo</title>
</head>

<body class="body">
    <!--LLamado del controlador-->
    <?php
    //Mensaje de error por si pasa algo:
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    //Fin de mensaje de error
    //ruta controlador
    require('../controller/Controller_productos.php');
    //Relleno del array productos
    $productos = get_productos();
    ?>
    <!--Fin del llamado controllador-->
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
            <img src="img/producto-navbar.svg" width="150px" height="150px">
        </div>
    </div>
    <div class="container-registro">
        <div class="flex-item fontype">
            <h1 class="title">
                INFORMACIÓN PRODUCTOS
            </h1>
        </div>
    </div>
    <!--Fin del logotipo ingreso-->

    <!--Tabla productos-->
    <div class="container">
        <table>
            <tr>
                <th colspan="3">Productos</th>
            </tr>
            <!--Parte codigo php-->
            <?php
            //relleno de datos usuarios
            foreach ($productos as $prod) {
                echo '<tr>';
                echo "<td>" . $prod['prod_id'] . "</td>";
                echo "<td>" . $prod['prod_nombre'] . "</td>";
            ?>
                <td class="dropdown">
                    <button class="btn-menu-crud">
                        <img src="img/btn---.svg" width="20" height="20">
                    </button>
                    <div class="dropdown-content">
                        <a href="detalles_producto.php?id=<?php echo $prod['prod_id']; ?>">Detalles</a>
                        <a href="actualizar_producto.php?id=<?php echo $prod['prod_id']; ?>">Actualizar</a>

                        <form method="post">
                        <button type="submit" href="#?id=<?php echo $prod['prod_id']; ?>" value="<?php echo $prod['prod_id']; ?>" name="btn-eliminar" class="btn-sin-estilo">
                            Eliminar
                        </button>
                        </form>
                    </div>
                </td>
            <?php
                echo '</tr>';
            }
            ?>
            <!--Fin codigo-->
        </table>
    </div>
    <!--Fin tabla productos-->

    <br>
    <!--Botones-->
    <div class="container">
        <div class="btns-form">
            <a href="crear_productos.php">
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
            <!--Parte de la alerta-->
            <div id="alertBox" class="alert-box">
            ?>
            <div class="alert-content">
                <span class="close-btn" onclick="closeAlert()">&times;</span>
                <h2>
                    ¿Desea eliminar este producto?
                </h2>
                <p>Si elimina este producto, no podra volver a encontrarlo en la tabla</p>
                <div class="btns-form-alerta">
                    <form method="post">
                        <button type="submit" class="btn-form" name="eliminar">
                            Eliminar
                        </button>
                    </form>
                    <button type="button" onclick="closeAlert()" class="btn-form-cancelar">
                        Cancelar
                    </button>
                </div>
            </div>
        </div>
        <!--Fin de la alerta-->
    <!--codigo para borrar un producto-->
    <?php
        if(isset($_POST['btn-eliminar'])){
            $id_el = $_POST['btn-eliminar'] ?? '';
            if (eliminar_producto($id_el) == true) {
                echo '<script>alert("Se elimino con exito: ' . $id_el . '")
                        window.location.replace("../public/tabla_productos.php");
                        </script>';
            } else {
                echo '<script>alert("No se pudo eliminar el producto")</script>';
            }
    }
    ?>
    <!--Fin-->
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