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
            <h1 align="center">Modificar Jugador</h1>
            <a href="menu.php">Menú</a>
        </div>

        <div id="contenido">
            <form action="modificar.php" method="POST" align="center">
                <label for="dni">Ingresa el DNI del jugador a modificar:</label>
                <input type="text" name="dni">
                <br><br>
                <label for="nuevo_nombre">Nuevo Nombre:</label>
                <input type="text" name="nuevoNombre">
                <br><br>
                <br>
                <input type="submit" value="Modificar">
            </form>
            <?php
            if (isset($_POST['dni']) && isset($_POST['nuevoNombre'])) {
                $dni = $_POST['dni'];
                $nombre = $_POST['nuevoNombre'];

                $conex = new mysqli('localhost', 'dwes', 'abc123.', 'jugadores');
                if ($conex->connect_error) {
                    die("Error de conexión a la base de datos: " . $conex->connect_error);
                }


                $stmt = $conex->prepare("UPDATE jugador SET nombre = ? WHERE dni = ?");
                $stmt->bind_param('ss', $nombre, $dni);
                if ($stmt->execute()) {
                    echo "Los datos del jugador con DNI " . $dni . " han sido modificados con éxito.";
                } else {
                    echo "Error al modificar los datos del jugador con DNI" . $dni . ": " . $conex->error;
                }

                $stmt->close();
                $conex->close();
            } else {
                echo "Por favor, complete todos los campos del formulario.";
            }
            ?>
        </div>
    </body>
</html>