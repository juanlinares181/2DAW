<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 4</title>
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

            for ($fila = 1; $fila <= 5; $fila++) {
                echo "<tr>";
                for ($columna = 1; $columna <= 7; $columna++) {
                    echo "<td>" . $num . "</td>";
                    $num++;
                }
                echo "</tr>";
            }
            ?>
        </table>
    </body>
</html>



