<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Link CSS-->
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <title>Chuzo || Actualizar Producto</title>
</head>

<body class="body">
    <?php
    //Mensaje de error por si pasa algo
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    //fin
    require('../controller/Controller_productos.php');
    //Toma del id necesario para llenar datos
    if (isset($_GET['id'])) {
        $id = $_GET['id'] ?? '';
        $prod = detalle_producto($id);
        $cate = get_categoria();
    } else {
        echo "No se pudo tomar el id";
    }
    //Fin de mensaje
    ?>
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
                    <a href="tabla_productos.html">Productos</a>
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
                <img class="logo-menu" src="img/logo.svg" width="70" height="70">
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
                ACTUALIZAR PRODUCTOS
            </h1>
        </div>
    </div>
    <!--Fin del logotipo ingreso-->

    <!--Formulario producto-->
    <div class="container">
        <form method="post">
            <div class="title-form">
                <h3 class="title-h4">Nombre Producto</h3>
            </div>
            <div>
                <input class="input" type="text" class="input-with-logo" name="nombre" minlength="1" value="<?php echo $prod['prod_nombre']; ?>" required>
            </div>
            <div class="title-form">
                <h3 class="title-h4">Precio Producto</h3>
            </div>
            <div>
                <input class="input" type="text" class="input-with-logo" name="precio" value="<?php echo $prod['prod_precio']; ?>" required>
            </div>
            <div class="title-form">
                <h3 class="title-h4">Categoria Producto</h3>
            </div>
            <div>
                <select name="select" class="input" required>
                    <option value="<?php echo $prod['prod_cate_id']; ?>"><?php echo $prod['prod_cate_id'] . " -- " . $prod['cate_nombre']; ?></option>
                    <?php
                    foreach ($cate as $c) {
                        if ($c['cate_id'] == $prod['prod_cate_id']) {
                            continue;
                        } else {
                    ?>
                            <option value="<?php echo $c['cate_id']; ?>"><?php echo $c['cate_id'] . " -- " . $c['cate_nombre']; ?></option>
                    <?php
                        }
                    }
                    ?>
                </select>
            </div>
            <br><br>
            <div class="btns-form">
                <button type="submit" class="btn-form" name="actualizar">Actualizar</button>
                <a href="tabla_productos.php"><button type="button" class="btn-form-cancelar">Cancelar</button></a>
            </div>
        </form>
    </div>
    <!--Fin formulario Crear producto-->
        <?php
            if(isset($_POST['actualizar'])){
                //validar los datos
                $nombre_prod = $_POST['nombre'] ?? '';
                $precio_prod = $_POST['precio'] ?? '';
                $cate_prod   = $_POST['select'] ?? '';
                $id_prod = $id;
                if(actualizar_producto($id_prod, $nombre_prod, $precio_prod, $cate_prod)==true){
                    echo '<script>alert("Se actualizo con exito")
                    window.location.replace("../public/tabla_productos.php");
                    </script>';
                }else{
                    echo '<script>alert("No se puedo actualizar")</script>';
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