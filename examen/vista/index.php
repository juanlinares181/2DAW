<?php
require_once '../controller/CitasController.php';
require_once '../controller/ItvsController.php';
require_once '../controller/UsuarioController.php';
require_once '../controller/VehiculoController.php';

if (isset($_POST['acceder']) && isset($_POST['usuario']) && isset($_POST['pass'])) {
    $usuario = UsuarioController::buscarUser($_POST['usuario'], $_POST['pass']);

    if ($usuario != null) {
        session_start();
            // Obtener la información del usuario (ajusta según tu lógica)
            // $row = ['pass' => $usuario->pass]; // Ajusta según la estructura de tu usuario
            // Obtener la contraseña proporcionada por el usuario
            // $password = $_POST['pass'];

            // Verificar la contraseña usando password_verify
            if (password_verify($_POST['pass'], $usuario->pass)) {
                // Agregar el nombre de usuario a la sesión
                $_SESSION['usuario'] = $usuario;
                header("Location: menu.php"); // Cambiado a menu.php
                exit();
            } else {
                // Contraseña incorrecta
                echo "Usuario o contraseña incorrectos";
            }
        
    } else {
        // Usuario no encontrado
        echo "Usuario o contraseña incorrectos";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Gestion de citas de ITV Andalucia</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
        <h1 align='center'>Gestion de citas de ITV Andalucia</h1>
        <form action="" method="post" align='center'>
            Usuario: <input type="text" name="usuario" placeholder="user..."><br><br>
            Password: <input type="password" name="pass" placeholder="password..."><br><br>
            <input type="submit" name="acceder" value="Acceder"><br>
        </form>
    </body>
</html>