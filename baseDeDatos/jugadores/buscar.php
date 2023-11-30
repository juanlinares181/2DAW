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
            <a href="menu.php">Menú</a><br><br>
            <h1 align="center">Buscar Jugador</h1>
        </div>

        <div id="contenido">
 
        <?php
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $parametro = $_POST['parametro'];
            $valor = $_POST['valor'];

            $conex = new mysqli('localhost', 'dwes', 'abc123.', 'jugadores');
            if ($conex->connect_error) {
                die("Error de conexión a la base de datos: " . $conex->connect_error);
            }

            // Utilizamos una consulta preparada para evitar problemas de seguridad
            $stmt = $conex->prepare("SELECT * FROM jugador WHERE $parametro = ?");
            $stmt->bind_param('s', $valor);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                echo "<table border='1' align='center'>";
                echo "<tr><th>Nombre</th><th>DNI</th><th>Dorsal</th><th>Posición</th><th>Equipo</th><th>Número de Goles</th></tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["Nombre"] . "</td>";
                    echo "<td>" . $row["DNI"] . "</td>";
                    echo "<td>" . $row["Dorsal"] . "</td>";
                    echo "<td>" . $row["Posicion"] . "</td>";
                    echo "<td>" . $row["Equipo"] . "</td>";
                    echo "<td>" . $row["NumeroGoles"] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "El jugador no se encuentra en la base de datos.";
            }
            $stmt->close();
            $conex->close();
        }
        ?>
            <form action="" method="POST" align="center"><br>
                <label for="parametro">Selecciona un criterio de búsqueda:</label>
            <select name="parametro">
                <option value="dni">DNI</option>
                <option value="equipo">Equipo</option>
                <option value="posicion">Posición</option>
            </select>
                <br><br>
            <label for="valor">Ingresa el valor a buscar:</label>
            <input type="text" name="valor">
            <br><br>
            <input type="submit" value="Buscar">
        </form>
    </div>
    </body>
</html>
