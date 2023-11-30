<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>BASE DE DATOS</title>
    </head>
    <body>
        <?php
        mysql_report(MYSQLI_REPORT_OFF);
        $conex=@new mysqli('localhost', 'dwes', 'abc123.', 'prueba');
        if ($conex->connect_errno) {
            echo "ERROR";
        } else {
            echo "TODO CORRECTO";
            $conex->query('INSERT INTO empleados (Codigo,Nombre,Apellidos,Salario) VALUES (1, "Antonio", "de la Rosa", 1500)');
            if (!$conex->errno) {
                echo "TODO CORRECTO";
            }
            $conex->query('UPDATE empleados SET Salario=2000 WHERE Nombre=Antonio');
            if (!conex->errno) {
                echo "TODO CORRECTO";
            }
        }
        
        ?>

    </body>   
</html>
