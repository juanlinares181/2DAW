<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 8</title>

    </head>
    <body>
        <?php
        $sumPares = 0;
        
        for ($i = 2; $i <= 200; $i++) {
            $sumPares += $i;
        }

        echo "La suma de los numeros pares son ".$sumPares;

        ?>
    </body>
</html>

