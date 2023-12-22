<?php
require_once '../controller/CitasController.php';
require_once '../controller/ItvsController.php';
require_once '../controller/UsuarioController.php';

session_start();

if (!isset($_SESSION['nombre'])) {
   header("Location:index.php");
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
                <h2 align='center'>Sedes de ITV de la provincia de</h2><?php echo "" . $_SESSION['provincia']; ?>
                <table class="table table-hover">
                    <thead class="thead bg-info text-white">
                        <tr>
                            <th>Localidad</th>
                            <th>Direccion</th>
                            <th>Citas</th>
                        </tr>
                    </thead>

                    <?php
                    try {
                        $conex = new Conexion();

                        $itvs = ItvsController::recuperarItv();

                        foreach ($itvs as $values) {
                            ?>

                            <tr>
                                
                                <td><?php echo $values->localidad ?></td>
                                <td><?php echo $values->direccion ?></td>
                                <td><form action="citas.php" method="post"><button class="visible" type="submit" name="misCitas" value="Mis Citas" <?php if ($values->alquilado == 'SI') echo "style= 'display: none;'"; ?>>Mis Citas</button>  </form> </td
                            </tr> 
                            
                            <?php
                                   
                        }
                    } catch (PDOException $ex) {
                        echo 'No existen sedes de ITV para esta provincia ' . $ex->getMessage(); // error del servidor de bd
                    }
                    ?>

                </table>
            </div>
        </div>

    </body>
</html>

