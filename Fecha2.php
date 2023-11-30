<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require_once './funciones.php';
        $dia = date('N');
        $mes = date('n');

        echo "<br>=================<br>";
        $d = 0;
        $dia = 0;
        $m = 0;
        $a = 0;
        $tunix = mktime(12, 0, 0, 9, 1, 2023);
        fecha($d, $dia, $m, $a);
        echo $d.", ".$dia." de ".$m." de ".$a;
        ?>
    </body>
</html>

