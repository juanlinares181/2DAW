<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <link href="dwes.css" rel="stylesheet" type="text/css">
        <meta charset="UTF-8">
        <title></title>
        <style type="text/css">
            h1 {
                margin-bottom:0;
                background-color: khaki;
            }
            #encabezado {
                background-color: khaki;
            }
            #contenido {
                background-color: khaki;
                height:600px;
            }
            #pie {
                background-color: khaki;
                color:#ff0000;
                height:30px;
            }
        </style>
    </head>
    <body>
        <div id="encabezado">
            <h1 align="center">Borrar Jugador por DNI</h1>
            <a href="menu.php">Menú</a>
        </div>

        <div id="contenido">
            <?php
            if (isset($_POST['dni'])) {
                $dni = $_POST['dni'];

                $conex = new mysqli('localhost', 'dwes', 'abc123.', 'jugadores');
                if ($conex->connect_error) {
                    die("Error de conexión a la base de datos: " . $conex->connect_error);
                }

                $stmt = $conex->prepare("DELETE FROM jugador WHERE dni = ?");
                $stmt->bind_param('s', $dni);
                if ($stmt->execute()) {
                    echo "El jugador con DNI" . $dni . " ha sido eliminado con éxito.";
                } else {
                    echo "Error al eliminar el jugador con DNI" . $dni . ": " . $conex->error;
                }

                $stmt->close();
                $conex->close();
            }
            ?>
            <form action="borrar.php" method="POST" align="center">
                <label for="dni">Ingresa el DNI del jugador a borrar:</label>
                <input type="text" name="dni">
                <br><br>
                <input type="submit" value="Borrar">
            </form>
        </div>
    </body>
</html>
