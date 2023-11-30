
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 4</title>
    </head>
    <body>
        <?php
        $a = array(
                "Nombre" => "Pedro Torres",
                "Direccion" => "C/ Mayor, 37",
                "Telefono" => 123456789
            
        );
        
        echo '<td><br>'.$a['Nombre'].'</td>';
        echo '<td><br>'.$a['Direccion'].'</td>';
        echo '<td><br>'.$a['Telefono'].'</td>';
        ?>
    </body>
</html>