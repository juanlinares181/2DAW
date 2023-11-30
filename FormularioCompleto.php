<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Formulario Completo</title>
    </head>
    <body>
     <?php
    if (isset($_POST['enviar'])) {
       
    } else {
    
    if (isset($_POST['enviar'])) {
        echo "Nombre: ".$_POST['nombre']."<br>";
        echo "Apellidos: ".$_POST['apellidos']."<br>";
        
        if (isset($_POST['sexo'])) {
            echo "sexo seleccionado:<br>";
            foreach ($_POST['sexo'] as $value) {
                echo $value."<br>";
            }
        }
        
        if (isset($_POST['aficiones'])) {
            echo "aficiones seleccionadas:<br>";
            foreach ($_POST['aficiones'] as $value) {
                echo $value."<br>";
            }
        }
        
        if (isset($_POST['estudios'])) {
            echo "estudios seleccionados:<br>";
            foreach ($_POST['estudios'] as $value) {
                echo $value."<br>";
            }
        }
        
        if (isset($_POST['edad'])) {
            echo "edad seleccionada:<br>";
            foreach ($_POST['edad'] as $value) {
                echo $value."<br>";
            }
        }
        echo '<br><a href="">Atras</a>';
    } else {
    ?>
    <form action="" method="POST"><br>
        Nombre: <input type="text" name="nombre" value=""><br><br>
        Apellidos: <input type="text" name="apellidos" value=""><br><br>
        Sexo: 
            Hombre: <input type="radio" name="sexo[]" value="hombre">
            Mujer: <input type="radio" name="sexo[]" value="mujer">
            Otro: <input type="radio" name="sexo[]" value="otro"><br><br>
        Aficiones: 
            Cine: <input type="checkbox" name="aficiones[]" value="cine">
            Lectura: <input type="checkbox" name="aficiones[]" value="lectura">
            Television: <input type="checkbox" name="aficiones[]" value="television"><br>
            Deporte: <input type="checkbox" name="aficiones[]" value="deporte"> 
            Musica: <input type="checkbox" name="aficiones[]" value="musica"><br><br>
        Estudios: 
            <select name="estudios" multiple>
                <option>ESO</option>
                <option>Bachillerato</option>
                <option>CFGM</option>
                <option>CFGS</option>
                <option>Universidad</option>
            </select><br><br>
        Edad: 
            <select name="edad">
                <option value="edad">Entre 1 y 14</option>
                <option value="edad">Entre 14 y 25</option>
                <option value="edad">Entre 26 y 35</option>
                <option value="edad">Mas de 35</option>
            </select><br><br>
        <input type="submit" name="enviar" value="Enviar">
    </form>
    <?php
    }
    
    }
    ?>
    
   </body>   
</html>

