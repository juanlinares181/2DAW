<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 5</title>
        <style>
            table {
                border-collapse: collapse;
            }

            table, th, td {
                border: 1px solid black;
            }

            th, td {
                padding: 10px;
            }
        </style>
    </head>
    <body>
        <table>
            <?php
            $num = 1;
            $fila = 1;

            do {
                echo "<tr>";
                $columna = 1;
                do {
                    echo "<td>".$num."</td>";
                    $num++;
                    $columna++;
                } while ($columna <= 7);
                echo "<tr>";
                $fila++;
            } while ($fila <= 5);
            ?>
        </table>
    </body>
</html>