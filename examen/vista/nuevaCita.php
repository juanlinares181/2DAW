<?php
require_once '../controller/CitasController.php';
require_once '../controller/ItvsController.php';
require_once '../controller/UsuarioController.php';
require_once '../controller/VehiculoController.php';
session_start();

if (!isset($_SESSION['nombre'])) {
    // header("Location:index.php");
}

if (isset($_POST['cerrar'])) {

    if (!$_SESSION['nombre'] && !$_SESSION['telefono'] && !$_SESSION['provincia']) {
        header('location: index.php');
    } else {
        setcookie(session_name(), "", time() - 3600, "/");
        session_unset();
        session_destroy();
        header('location: index.php');
    }
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
                    </form><br>
                    <form action="menu.php" method="post">
                        <input type="submit" name="Volver" value="Volver">
                    </form>
                </div>
                <h2 align='center'>Gestion de cita en la ITV de</h2><?php echo "" . $_SESSION['provincia']; ?>
                <?php
                try {
                    $conex = new Conexion();

                    $vehiculos = VehiculoController::buscarVehiculo();

                    foreach ($vehiculos as $values) {
                        ?>


                        <?php echo $values->matricula ?>

                        <?php
                    }
                } catch (PDOException $ex) {
                    echo 'No existe ningun vehiculo con esa matricula' . $ex->getMessage(); // error del servidor de bd
                }
                ?>

                <?php
                try {
                    $conex = new Conexion();

                    $citas = CitasController::anularCita();

                    
                } catch (PDOException $ex) {
                    $ex->getMessage(); // error del servidor de bd
                }
                ?>

                <?php
                if (!isset($_POST['siguiente']) && !isset($_POST['siguiente2'])) {
                    ?>




                    <h1 align="center">Datos del Vehiculo</h1>
                    <form action="" method="POST" align="center"><br>
                        Matricula: <input type="text" name="matricula" value="<?php if (isset($_POST['cancelar'])) echo $_POST['matricula']; ?>"><br><br>

                        Marca: <input type="text" name="marca" value="<?php if (isset($_POST['cancelar'])) echo $_POST['marca']; ?>"><br><br>

                       
                        Elegir ITV: <select multiple="" >
                        
                        </select> <br><br>

                    </form>

                    <?php
                }
                if (isset($_POST['siguiente2'])) {
                    echo "Matricula: " . $_POST['matricula'] . "<br>";
                    echo "Marca: " . $_POST['marca'] . "<br>";
                    $sexo = explode(";", $_POST['sexo']);
                    ?>
                    <form action="" method="POST">
                        <input type="submit" name="cancelar" value="Cancelar">
                    </form>
                    <br>
                    <form action="" method="POST">
                        <input type="submit" name="confirmar" value="Confirmar">
                    </form>
                    <?php
                }
                ?>
                </thead>



                </table>
            </div>
        </div>

    </body>
</html>


