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

    if (!$_SESSION['nombre'] && !$_SESSION['telefono'] && !$_SESSION['localidad']) {
        header('location: index.php');
    } else {
        setcookie(session_name(), "", time() - 3600, "/");
        session_unset();
        session_destroy();
        header('location: index.php');
    }
}

if (is_uploaded_file($_FILES['foto']['tmp_name'])) {
        $vehiculo = new Vehiculo();
        $fich_unic = time() . "-" . $_FILES['foto']['name'];
        $ruta = "imagenes/" . $fich_unic;
        //para copiar el fichero en la carpeta usamos la funcion move_uploaded_file
        move_uploaded_file($_FILES['foto']['tmp_name'], '../'.$ruta);

        $vehiculo->vehiculo($resultado . "-" . $_POST['matricula'], $_POST['marca'], $_POST['modelo'], $_POST['fecha'], $_POST['hora'], $ruta);
        VehiculoController::recuperarVehiculoItv($vehiculo);
    } else {
        echo 'ERROR al cargar la imagen';
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
                <h2 align='center'>Vehiculos con cita en la ITV de</h2><?php echo "" . $_SESSION['localidad']; ?>
                <table class="table table-hover">
                    <thead class="thead bg-info text-white">
                        <tr>
                            <th>Matricula</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Ficha</th>
                            
                        </tr>
                    </thead>

                    <?php
                    try {
                        $conex = new Conexion();

                        $vehiculos = VehiculoController::recuperarVehiculoItv();

                        foreach ($vehiculos as $values) {
                            ?>

                            <tr>

                                <td><a href="<?php echo $values->codigo ?>"> <img src="../<?php echo $values->imagen ?>" width="60px" height="70px" style='filter: grayscale(100%);'"; ?>/></a>
                                <td><?php echo $values->matricula ?></td>
                                <td><?php echo $values->marca ?></td>
                                <td><?php echo $values->modelo ?></td>
                                <td><?php echo $values->fecha ?></td>
                                <td><?php echo $values->hora ?></td>
                                <td><?php echo $values->ficha ?></td>
                            </tr> 

                            <?php
                        }
                    } catch (PDOException $ex) {
                        echo 'No existen citas para esta sede' . $ex->getMessage(); // error del servidor de bd
                    }
                    ?>

                </table>
            </div>
        </div>

    </body>
</html>


