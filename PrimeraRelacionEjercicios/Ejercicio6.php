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
        $suma = 0;

        for ($numEntero = 1; $numEntero <= 100; $numEntero++) {
            $suma += $numEntero;
            
        }
        echo "La suma de los números enteros con For es: ".$suma."<br>";
        ?>

        <?php
        $numEntero = 1;
        $suma = 0;
        while ($numEntero <= 100) {
            $suma += $numEntero;
            $numEntero++;
            
        }
        echo "La suma de los números enteros con While es: ".$suma."<br>";
        ?>

        <?php
        $numEntero = 1;
        $suma = 0;
        do {
           $suma += $numEntero;
           $numEntero++;
            
        } while ($numEntero <= 100);
        echo "La suma de los números enteros con Do While es: ".$suma."<br>";
        ?>

    </body>
</html>