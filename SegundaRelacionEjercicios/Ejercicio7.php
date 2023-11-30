<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 7</title>
    </head>
    <body>
        <?php
        $personas = array("Pedro", " Ismael", " Sonia", " Clara", " Susana", " Alfonso", " Teresa");

        echo "El número de elementos en el array es: ".count($nombres)."<br>";
  
        echo "ul";
        foreach ($personas as $persona) {
            echo "<li>$nombre</li>";
        }
        echo "/ul";
        ?>
    </body>
</html>
