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
        <div id="contenido">
            <a href="menu.php">Menú</a><br><br>
            <h1 align="center">Añadir Viaje</h1><br>

            <?php
            try {
                $pdo = new PDO('mysql:host=localhost;dbname=autobuses', 'dwes', 'abc123.');
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Error de conexión: " . $e->getMessage();
            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $fecha = $_POST['fecha'];
                $matricula = $_POST['matricula'];
                $origen = $_POST['origen'];
                $destino = $_POST['destino'];
                $num_plazas = $_POST['num_plazas'];

                $errores = array();

                if (!strtotime($fecha)) {
                    $errores[] = "La fecha no es válida.";
                }
                
                if (!is_numeric($num_plazas) || $num_plazas < 0) {
                    $errores[] = "El número de plazas no es válido, debe ser un número positivo";
                } else {
                    $stmt = $pdo->prepare("SELECT Num_plazas FROM autos WHERE Matricula = ?");
                    $stmt->execute([$matricula]);
                    $autobusPlazas = $stmt->fetchColumn();

                    if ($num_plazas > $autobusPlazas) {
                        $errores[] = "El número de plazas en el viaje no puede ser mayor al número de plazas del autobús";
                    }
                }

                if (empty($errores)) {

                    $stmt = $pdo->prepare("INSERT INTO viajes (Fecha, Matricula, Origen, Destino, Plazas_libres) VALUES (?, ?, ?, ?, ?)");
                    $stmt->execute([$fecha, $matricula, $origen, $destino, $num_plazas]);

                    echo "Viaje añadido correctamente";
                } else {
                    echo "Por favor, corrige los siguientes errores:<br>";
                    foreach ($errores as $error) {
                        echo "$error<br>";
                    }
                }
            }
            ?>
            <form action="anadirViaje.php" method="post" align="center">
                Fecha: <input type="date" name="fecha" required><br><br>
                Matrícula: 
                <select name="matricula" required>
                    <?php
                    $stmt = $pdo->prepare("SELECT Matricula FROM autos");
                    $stmt->execute();
                    $matriculas = $stmt->fetchAll(PDO::FETCH_COLUMN);
                    foreach ($matriculas as $matricula) {
                        echo "<option value='$matricula'>$matricula</option>";
                    }
                    ?>
                </select><br><br>
                Origen: <input type="text" name="origen" required><br><br>
                Destino: <input type="text" name="destino" required><br><br>
                Nº de plazas: <input type="number" name="num_plazas" required><br><br>
                <input type="submit" value="Añadir Viaje">
            </form>

            <?php
            $pdo = null;
            ?>
        </div>
    </body>
</html>
