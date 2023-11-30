<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 10</title>
    </head>
    <body>
        <?php
        $numeros = array(3, 2, 8, 123, 5, 1);

        sort($numeros);

        echo "Números Ordenados de Menor a Mayor";
        echo "<table border='1'><br>";
        echo "<tr><th>Índice</th><th>Valor</th></tr>";

        foreach ($numeros as $indice => $valor) {
            echo "<tr><td>$indice</td><td>$valor</td></tr>";
        }

        echo "</table>";
        ?>
    </body>
</html>

