<!DOCTYPE html>
<html lang="es">
<?php session_destroy(); ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Link CSS-->
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <!--Titulo-->
    <title>Ingreso || Chuzo</title>
</head>

<body class="body">
    <!--Inicio Navbar-->
    <nav>
        <div class="navbar-1">
            <ul class="menu">
                <li class="flex-container">
                    <img src="img/ingreso-1.svg" width="30" height="30" class="menu-logo">
                    <a href="#">Ingreso</a>
                </li>
                <hr>
                <li class="flex-container">
                    <img src="img/registro-1.svg" width="30" height="30" class="menu-logo">
                    <a href="registro.php">Registro</a>
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
            <img src="img/logo-ingreso.svg" width="150px" height="150px">
        </div>
    </div>
    <div class="container-registro">
        <div class="flex-item fontype">
            <h1 class="title">
                CHUZO INGRESO
            </h1>
        </div>
    </div>
    <!--Fin del logotipo ingreso-->

    <!--Formulario-->
    <div class="container">
        <form method="get" action="login_process.php">
            <div class="title-form">
                <h3 class="title-h4">Correo</h3>
            </div>
            <div>
                <input class="input" type="email" class="input-with-logo" id="username" name="email" multiple required>
            </div>
            <div class="title-form">
                <h3 class="title-h4">Contraseña</h3>
            </div>
            <div class="logo-input">
                <input type="password" class="input" id="password" name="password" required>
            </div>
            <br><br>
            <div class="btns-form">
                <button type="submit" class="btn-form">Ingresar</button>
                <a href="registro.php"><button type="button" class="btn-form" name="enviar">Registrarse</button></a>
            </div>
        </form>
    </div>
    <!--Fin formulario-->
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