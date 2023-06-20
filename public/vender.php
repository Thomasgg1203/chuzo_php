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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Link CSS-->
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <title>Chuzo || Crear Producto</title>
</head>

<body class="body">
    <?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    require('../controller/Controller_ordenes.php');
    $usuarios = get_usuarios();
    $productos = get_productos();
    ?>
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
            <img src="img/vender-navbar.svg" width="150px" height="150px">
        </div>
    </div>
    <div class="container-registro">
        <div class="flex-item fontype">
            <h1 class="title">
                VENDER PRODUCTO
            </h1>
        </div>
    </div>
    <!--Fin del logotipo ingreso-->

    <!--Formulario producto-->
    <div class="container">
        <form method="post">
            <div class="title-form">
                <h3 class="title-h4">Producto</h3>
            </div>
            <div>
                <select name="prod" class="input" required>
                <?php
                    foreach ($productos as $p) {
                    ?>
                            <option value="<?php echo $p['prod_id']; ?>"><?php echo $p['prod_id'] . " -- " . $p['prod_nombre']; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="title-form">
                <h3 class="title-h4">Usuario</h3>
            </div>
            <div>
            <select name="usu" class="input" required>
                <?php
                    foreach ($usuarios as $u) {
                    ?>
                            <option value="<?php echo $u['usu_id']; ?>"><?php echo $u['usu_id'] . " -- " . $u['usu_nombre']; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="title-form">
                <h3 class="title-h4">Cantidad</h3>
            </div>
            <div>
                <input class="input" type="number" class="input-with-logo" name="cant" required minlength="1">
            </div>
            <div class="title-form">
                <h3 class="title-h4">Fecha</h3>
            </div>
            <div>
                <input class="input" type="date" class="input-with-logo" name="fecha" required minlength="1">
            </div>
            <br><br>
            <div class="btns-form">
                <button type="submit" class="btn-form" name="crear">Vender</button>
                <a href="menu.php"><button type="button" class="btn-form-cancelar">Cancelar</button></a>
            </div>
        </form>
    </div>
    <!--Fin formulario Crear producto-->
        <?php
            if(isset($_POST['crear'])){
                //validar los datos
                $prod = $_POST['prod'];
                $usu = $_POST['usu'];
                $cant = $_POST['cant'];
                $fecha = $_POST['fecha'];
                //Tomar el valor verdadero de fecha
                $partes = explode("/", $fecha);
                $fecha1 = implode("-", array_reverse($partes));
                //validar que se vendio
                if(vender($prod, $usu, $cant, $fecha1)==true){
                    echo '<script>alert("Se realizo la venta con exito")
                    window.location.replace("../public/menu.php");
                    </script>';
                }else{
                    echo '<script>alert("No se pudo realizar la venta")</script>';
                }
            }
        ?>
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