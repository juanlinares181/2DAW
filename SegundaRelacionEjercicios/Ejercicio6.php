<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 6</title>
    </head>
    <body>
        <?php
        $ciudades = array("Madrid", " Barcelona", " Londres", " New York", " Los Angeles", " Chicago");

        for ($i = 0; $i < 6; $i++) {
            echo "<td>".$ciudades[$i]."</td><br>";
        }

        for ($i = 0; $i < 6; $i++) {
            echo "La ciudad con el indice ".$i." tiene el nombre de ".$ciudades[$i]."<br>";
        }
        ?>
    </body>
</html>

