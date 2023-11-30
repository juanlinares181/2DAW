<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 3</title>

    </head>
    <body>
        <?php
        $a = rand(1, 100);
        $b = rand(1, 100);
        $c = rand(1, 100);

        echo " Los numeros aleatorios son " . $a . ", " . $b . " y " . $c . "<br>";

        if ($a >= $b && $a >= $c) {
            echo "El numero ".$a." es el mayor";
        } elseif ($b >= $a && $b >= $c) {
            echo "El numero ".$b." es el mayor";
        } elseif ($c >= $a && $c >= $b) {
            echo "El numero ".$c." es el mayor";
        }
        ?>
    </body>
</html>


