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
            <h1 align="center">Añadir Autobús</h1><br>

            <?php
            try {
                $pdo = new PDO('mysql:host=localhost;dbname=autobuses', 'dwes', 'abc123.');
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Error de conexión: " . $e->getMessage();
            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $matricula = $_POST['matricula'];
                $marca = $_POST['marca'];
                $num_plazas = $_POST['num_plazas'];

                $errores = array();

                if (!preg_match('/^\d{3}[A-Z]{3}$/', $matricula)) {
                    $errores[] = "La matrícula debe tener 3 números seguidos de 3 letras (123ABC)";
                }

                if (strlen($marca) > 40) {
                    $errores[] = "La marca no puede tener más de 40 caracteres";
                }

                if (!is_numeric($num_plazas) || $num_plazas > 120) {
                    $errores[] = "El número de plazas no es válido, debe ser un número hasta 120";
                }

                if (empty($errores)) {
                    $stmt = $pdo->prepare("INSERT INTO autos (Matricula, Marca, Num_plazas) VALUES (?, ?, ?)");
                    $stmt->execute([$matricula, $marca, $num_plazas]);

                    echo "Autobús añadido correctamente";
                } else {
                    echo "Por favor, corrige los siguientes errores:<br>";
                    foreach ($errores as $error) {
                        echo "- $error<br>";
                    }
                }
            }
            ?>
            <form action="anadirAutobus.php" method="post" align="center">
                Matrícula: <input type="text" name="matricula" required><br><br>
                Marca: <input type="text" name="marca" required><br><br>
                Nº de plazas: <input type="number" name="num_plazas" required><br><br>
                <input type="submit" value="Añadir Autobús">
            </form>

            <?php
            $pdo = null;
            ?>
        </div>
    </body>
</html>

