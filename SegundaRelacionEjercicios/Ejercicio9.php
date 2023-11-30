<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 9</title>
    </head>
    <body>
        <?php
        $estadios_de_futbol = array(
            "Barcelona" => "Camp Nou",
            "Real Madrid" => "Santiago Bernabeu",
            "Valencia" => "Mestalla",
            "Real Sociedad" => "Anoeta"
        );

        echo "<h3>Estadios de futbol</h3>";
        echo "<table border='1'>";
        echo "<tr><th>Equipo</th><th>Estadio</th></tr>";
        foreach ($estadios_de_futbol as $equipo => $estadio) {
            echo "<tr><td>$equipo</td><td>$estadio</td></tr>";
        }

        echo "</table>";
        
        unset($estadios_de_futbol["Real Madrid"]);

        echo "<h3>Estadios de Fútbol sin el Real Madrid</h3>";
        echo "<il>";
        foreach ($estadios_de_futbol as $equipo => $estadio) {
            echo "<li>$equipo: $estadio</li>";
        }
        echo "</il>";
        ?>
    </body>
</html>
