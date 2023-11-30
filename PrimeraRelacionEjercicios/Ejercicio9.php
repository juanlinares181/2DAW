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
        $num1 = rand(1, 100);
        $num2 = rand(1, 100);
        $num3 = rand(1, 100);
        
        echo "Estos son los numeros aleatorios ".$num1.", ".$num2.", ".$num3."<br><br>";

        if ($num1 >= $num2 && $num1 >= $num3) {
            $mayor = $num1;
            if ($num2 >= $num3) {
                $medio = $num2;
                $menor = $num3;
            } else {
                $medio = $num3;
                $menor = $num2;
            }
        } elseif ($num2 >= $num1 && $num2 >= $num3) {
            $mayor = $num2;
            if ($num1 >= $num3) {
                $medio = $num1;
                $menor = $num3;
            } else {
                $medio = $num3;
                $menor = $num1;
            }
        } else {
            $mayor = $num3;
            if ($num1 >= $num2) {
                $medio = $num1;
                $menor = $num2;
            } else {
                $medio = $num2;
                $menor = $num1;
            }
        }

        echo "Números ordenados de mayor a menor: $mayor, $medio, $menor";
        ?>
    </body>
</html>

