<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 2</title>
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
            $num = rand(1, 100);

            for ($i = 0; $i < 10; $i++) {
                echo "<tr>";
                for ($j = 0; $j < 10; $j++) {
                    echo "<td>".$num."</td>";
                    $num += 2; 
                }
                echo "</tr>";
            }
            ?>
        </table>
    </body>
</html>

