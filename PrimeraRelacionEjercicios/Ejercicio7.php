<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 7</title>

    </head>
    <body>
        <?php
        $suma = 0;

        for ($i = 1; $i <= 100; $i++) {
            $cuadrado = $i * $i;
            $suma += $cuadrado;
        }

        echo "La suma de los cuadrados es: ".$suma;
        ?>
    </body>
</html>
