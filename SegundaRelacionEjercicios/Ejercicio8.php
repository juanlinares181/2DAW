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
        $numeros = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
        $sum_pares = 0;
        $contador = 0;

        echo "Numeros Impares: ";

        foreach ($numeros as $numero) {
            if ($numero % 2 != 0) {
                echo "$numero";
            } else {
                $sum_pares += $numero;
                $contador++;
            }
        }
        echo "</tr><br><br>";

        if ($contador > 0) {
            $media = $sum_pares / $contador;
            echo "Media de números pares: ".$media."</p><br>";
        } else {
            echo "No hay números pares en el array";
        }
        ?>
    </body>
</html>

