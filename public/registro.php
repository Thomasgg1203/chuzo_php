<!DOCTYPE html>
<html lang="es">
<?php 
session_destroy(); 
require('../controller/Controller_usuarios.php');
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Link CSS-->
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <title>Chuzo || Registro</title>
</head>

<body class="body">
    <!--Inicio Navbar-->
    <nav>
        <div class="navbar-1">
            <ul class="menu">
                <li class="flex-container">
                    <img src="img/ingreso-1.svg" width="30" height="30" class="menu-logo">
                    <a href="index.html">Ingreso</a>
                </li>
                <hr>
                <li class="flex-container">
                    <img src="img/registro-1.svg" width="30" height="30" class="menu-logo">
                    <a href="#">Registro</a>
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
            <img src="img/logo-registro.svg" width="150px" height="150px">
        </div>
    </div>
    <div class="container-registro">
        <div class="flex-item fontype">
            <h1 class="title">
                CHUZO REGISTRO
            </h1>
        </div>
    </div>
    <!--Fin del logotipo ingreso-->

    <!--Formulario-->
    <div class="container">
        <form method="post">
            <div class="title-form">
                <h3 class="title-h4">Documento</h3>
            </div>
            <div>
                <input class="input" type="text" class="input-with-logo" name="documento" required maxlength="15">
            </div>
            <div class="title-form">
                <h3 class="title-h4">Nombre</h3>
            </div>
            <div>
                <input class="input" type="text" class="input-with-logo" name="nombre" required maxlength="30">
            </div>
            <div class="title-form">
                <h3 class="title-h4">Apellido</h3>
            </div>
            <div>
                <input class="input" type="text" class="input-with-logo" name="apellido" required maxlength="30">
            </div>
            <div class="title-form">
                <h3 class="title-h4">Correo</h3>
            </div>
            <div>
                <input class="input" type="email" class="input-with-logo" multiple name="email" required maxlength="30">
            </div>
            <div class="title-form">
                <h3 class="title-h4">Contraseña</h3>
            </div>
            <div class="logo-input">
                <input type="password" class="input" name="contra" required maxlength="8">
            </div>
            <br><br>
            <div class="btns-form">
                <button type="submit" class="btn-form" name="enviar">Ok</button>
                <a href="index.php"><button type="button" class="btn-form-cancelar">Cancelar</button></a>
            </div>
        </form>
    </div>
    <!--Fin formulario-->
    <!--Parte de envio de datos-->
    <?php
    if(isset($_POST['enviar'])){
        $doc = $_POST['documento'];
        $nom = $_POST['nombre'];
        $ape = $_POST['apellido'];
        $ema = $_POST['email'];
        $con = $_POST['contra'];
        if(crear_usuario($doc, $nom, $ape, $ema, $con)){
            echo "<script>alert('Se creo correctamente')</script>";
            echo "<script>window.location.href = 'index.php';</script>";
        }else{
            echo "<script>alert('Se produjo un error al registrarse')</script>";
        }
    }
    ?>
    <!--Fin de envio de datos-->
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