
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 2</title>
    </head>
    <body>
        <?php
        $a = array();
        $numero = 20;
        
        for ($i = 20; $i > 0; $i--) {
            
            $numero -= 2;
            $a[] = $numero;
        }
        
        print_r($a);
        ?>
    </body>
</html>