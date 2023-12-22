<?php
require_once '../controller/CitasController.php';
require_once '../controller/ItvsController.php';
require_once '../controller/UsuarioController.php';
require_once '../controller/VehiculoController.php';

session_start();

if (!isset($_SESSION['nombre'])) {
    header("Location:index.php");
}

if (!isset($_SESSION['nombre']) || !isset($_SESSION['telefono']) || !isset($_SESSION['provincia'])) {
    header('Location:index.php');
} else {
    setcookie(session_name(), "", time() - 3600, "/");
    session_unset();
    session_destroy();
    header('Location:menu.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="ISO-8859-1">
        <title>Insert title here</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    </head>
    <body>


        <div class="container py-3">
            <div class="ml-3">
                <?php echo "Hola " . $_SESSION['nombre']; ?>
                <?php echo "Telefono: " . $_SESSION['telefono']; ?>

            </div>
            <div class="container">
                <div class="">
                    <form action="" method="post">
                        <input type="submit" name="cerrar" value="Cerrar Sesión">
                    </form>
                </div>
                <h2 align='center'>Gestion de citas de las ITV  de</h2><?php echo "" . $_SESSION['provincia']; ?>
                <h4 align='center'><a href='nuevaCita.php'>Registrar Nueva Cita</a></h4><br>
                <h4 align='center'><a href='listaItvs.php'>Listado de sedes de ITV</a></h4><br>
                <?php
                try {
                    $conex = new Conexion();
                    $usuarios = UsuarioController::recuperarUsers();

                    foreach ($usuarios as $usuario) {
                        echo "Provincia: " . $usuario->provincia . "<br>";
                    }
                } catch (PDOException $ex) {
                    echo 'Error al recuperar usuarios: ' . $ex->getMessage();
                }
                ?>
            </div>
        </div>

    </body>
</html>