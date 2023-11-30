
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 5</title>
    </head>
    <body>
        <?php
        $personas = array(
            array(
                "Nombre" => "Pedro Torres",
                "Direccion" => "C/ Mayor, 37",
                "Telefono" => 123456789
            ),
            array(
                "Nombre" => "Pablo Pato",
                "Direccion" => "C/ Menor, 20",
                "Telefono" => 987654321
            ),
            array(
                "Nombre" => "Manuel Zulema",
                "Direccion" => "C/ Oeste, 69",
                "Telefono" => 789123456
            ),
            array(
                "Nombre" => "Victoria Bedmar",
                "Direccion" => "C/ Este, 55",
                "Telefono" => 789456123
            ),
            array(
                "Nombre" => "Andrea Garcia",
                "Direccion" => "C/ Norte, 46",
                "Telefono" => 246813579
            ),
        );
        foreach ($personas as $persona) {
            echo '<td>'.$persona['Nombre'].'</td><br>';
            echo '<td>'.$persona['Direccion'].'</td><br>';
            echo '<td>'.$persona['Telefono'].'</td><br><br>';
            echo '</tr>';
        }
        ?>
    </body>
</html>