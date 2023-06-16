<?php
session_start();
// Obtener los datos enviados desde el formulario
$email = $_GET['email'];
$password = $_GET['password'];

$email = trim($email);
$password = trim($password);

require('../controller/Controller_usuarios.php');
$usuarios = get_usuarios();
$val = false;
foreach ($usuarios as $us) {
    if ($email == $us['usu_email'] && $password == $us['usu_contrasenia']) {
        // Iniciar sesión y establecer variables de sesión
        $_SESSION['id'] = $us['usu_id'];
        $_SESSION['nombre'] = $us['usu_nombre'];
        $_SESSION['loggedin'] = true;
        $_SESSION['email'] = $email;
        $_SESSION['estado'] = $us['usu_admin'];
        $val = true; //variable de entrada
        break;
    }
}
// Realizar la validación de las credenciales (ejemplo simplificado)
if ($val) {
    // Redirigir al usuario a otra página después de iniciar sesión
    echo "<script>alert('Bienvenido ".$_SESSION['nombre']."')</script>";
    echo "<script>window.location.href = 'menu.php';</script>";
} else {
    // Credenciales inválidas, mostrar mensaje de error o redirigir nuevamente a la página de inicio de sesión
    echo "<script>alert('Datos incorrectos')</script>";
    echo "<script>window.location.href = 'index.php';</script>";
}
?>
