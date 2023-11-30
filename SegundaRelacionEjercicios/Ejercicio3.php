
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 3</title>
    </head>
    <body>
        <?php
        $meses = array("Enero" => 9,"Febrero" => 12,"Marzo" => 0,"Abril" => 17);

        echo "Peliculas mostradas por mes: \n";
        
        foreach ($meses as $mes => $peliculas) {
            if ($peliculas > 0) {
                echo "<br>$mes:".$peliculas." Peliculas <br>";
            }
        }

        ?>
    </body>
</html>