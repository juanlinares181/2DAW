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
            <h1 align="center">Mostrar</h1>
        </div>

        <div id="contenido" align="center">
            <a href="menu.php">Menú</a><br><br>
            <?php
            try {
                $conex = new mysqli('localhost', 'dwes', 'abc123.', 'jugadores');
                $conex->set_charset('utf8mb4');
                $result = $conex->query("SELECT * FROM jugador");
            } catch (Exception $ex) {
                die($ex->getMessage());
            }
            if ($result->num_rows > 0) {
                while ($reg = $result->fetch_object()) {
                    echo "Nombre: " . $reg->Nombre . "<br>";
                    echo "DNI: " . $reg->DNI . "<br>";
                    echo "Dorsal: " . $reg->Dorsal . "<br>";
                    echo "Posicion: " . $reg->Posicion . "<br>";
                    echo "Equipo: " . $reg->Equipo . "<br>";
                    echo "Nº de Goles: " . $reg->NumeroGoles . "<br>";
                    echo "<br>";
                }
            } else {
                echo "No se ha recuperado nada";
            }
            ?>
        </div>

        <div id="pie">

        </div>
    </body>
</html>
