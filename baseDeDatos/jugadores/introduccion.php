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
        <?php
        if (isset($_POST['inscribir'])) {
            $nombre = $_POST['nombre'];
            $dni = $_POST['dni'];
            $dorsal = $_POST['dorsal'];
            $posicion = implode(', ', $_POST['posicion']);
            $equipo = $_POST['equipo'];
            $goles = $_POST['goles'];
            $errores = [];

            if (empty($nombre) || !preg_match("/^[A-Za-z]+$/", $nombre)) {
                $errores[] = "El campo Nombre no puede estar vacío y debe contener solo letras.";
            }


            if (empty($dni) || !preg_match("/^[0-9]{8}[A-Za-z]$/", $dni)) {
                $errores[] = "El campo DNI debe tener 8 números y una letra al final.";
            }


            if (empty($posicion)) {
                $errores[] = "Debes seleccionar al menos una Posición.";
            }


            if (empty($equipo)) {
                $errores[] = "El campo Equipo no puede estar vacío.";
            }


            if (empty($goles) || !is_numeric($goles)) {
                $errores[] = "El campo Número de Goles no puede estar vacío y debe contener solo números.";
            }

            

            if (count($errores) > 0) {
                echo "<div class='errores'>";
                foreach ($errores as $error) {
                    echo "<p>$error</p>";
                }
                echo "</div>";
            } else {

                $conex = new mysqli('localhost', 'dwes', 'abc123.', 'jugadores');
                if ($conex->connect_error) {
                    die("Error de conexión a la base de datos: " . $conex->connect_error);
                }

                $sql = "INSERT INTO Jugador (Nombre, DNI, Dorsal, Posicion, Equipo, `NumeroGoles`) VALUES (?, ?, ?, ?, ?, ?)";
                $stmt = $conex->prepare($sql);
                $stmt->bind_param("ssisss", $nombre, $dni, $dorsal, $posicion, $equipo, $goles);

                if ($stmt->execute()) {
                    echo "<div class='exito'>Datos guardados con éxito.</div>";
                } else {
                    echo "Error al guardar los datos: " . $stmt->error;
                }

                $dorsal = isset($_POST['dorsal']) ? $_POST['dorsal'] : null;

                // Verificar si se proporcionó un valor para Dorsal
                if ($dorsal !== null) {
                    // Resto del código para validar y guardar los datos en la base de datos
                    // ...
                } else {
                    // Manejar el caso en el que Dorsal no se ha seleccionado
                    // Puedes mostrar un mensaje de error o realizar alguna otra acción
                }

                $stmt->close();
                $conex->close();
            }
        }
        ?>
        <div id="contenido">
            <a href="menu.php">Menú</a><br><br>
            <h1 align="center">Jugador</h1>
            <form action="" method="post" align="center">
                Nombre: <input type="text" name="nombre"><br><br>
                DNI: <input type="text" name="dni"><br><br>
                Dorsal: <select name="dorsal">
                    <?php
                    for ($i = 1; $i <= 25; $i++) {
                        echo "<option value='$i'>$i</option>";
                    }
                    ?>
                </select><br><br>
                Posición: <br><select multiple="" name="posicion[]"><br>
                    <option value="centro">Centro Campista</option><br>
                    <option value="delantero">Delantero</option><br>
                    <option value="defensa">Defensa</option><br>
                    <option value="portero">Portero</option><br>
                </select><br><br>
                Equipo: <input type="text" name="equipo"><br><br>
                Nº de Goles: <input type="text" name="goles"><br><br>
                <input type="submit" name="inscribir" value="Inscribir"><br><br>
            </form>
        </div>
    </body>
</html>
