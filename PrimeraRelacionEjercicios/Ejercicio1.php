<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 1</title>
    </head>
    <body>
        
        <?php
        $ano = rand(0, 3000);

        if ($ano % 4 == 0) {
            if ($ano % 100 == 0) {
                if ($ano % 400 == 0) {
                    echo "El " . $ano . " es un año bisiesto";
                } else {
                    echo "El " . $ano . " no es un año bisiesto";
                }
            } else {
                echo "El " . $ano . " es un año bisiesto";
            }
        } else {
            echo "El " . $ano . " no es un año bisiesto";
        }
        ?>
    </body>
</html>

