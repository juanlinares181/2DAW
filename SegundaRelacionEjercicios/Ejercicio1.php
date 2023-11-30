
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 1</title>
    </head>
    <body>
        <?php
        $a = array();
        $numero = 0;
        
        for ($i = 0; $i < 10; $i++) {
            
            $numero += 2;
            $a[] = $numero;
        }
        
        print_r($a);
        ?>
    </body>
</html>



