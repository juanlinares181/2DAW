<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>TODOENUNO</title>
    </head>
    <body>

        <?php
        if (isset($_POST['enviar'])) {
            ?>
        <form action="todoenuno.php" method="POST" align="center"><br>
                Nº de Matricula: <input type="text" name="matricula"><br><br>
                Curso: 
                <select name="curso">
                    <option value="1º ESO">1º ESO</option>
                    <option value="2º ESO">2º ESO</option>
                    <option value="3º ESO">3º ESO</option>
                    <option value="4º ESO">4º ESO</option>
                    <option value="1º SMR">1º SMR</option>
                    <option value="2º SMR">2º SMR</option>
                    <option value="1º DAW">1º DAW</option>
                    <option value="2º DAW">2º DAW</option>
                </select><br><br>
                Precio: <input type="text" name="precio"><br><br>
                <input type="hidden" name="nombre" value="<?php echo $_POST['nombre']; ?>"> 
                <input type="hidden" name="apellidos" value="<?php echo $_POST['apellidos']; ?>"> 
                <input type="submit" name="siguiente2" value="Siguiente">
                <?php
            } else {
                ?>
                <form action="todoenuno.php" method="POST" align="center"><br>
                    Nombre: <input type="text" name="nombre" value=""><br><br>
                    Apellidos: <input type="text" name="apellidos" value=""><br><br>

                    <input type="submit" name="siguiente" value="Siguiente">
                </form>
                
                <?php
            }
            if(isset($_POST['siguiente2'])) {
            echo "Nombre: " . $_POST['nombre'] . "<br>";
            echo "Apellidos: " . $_POST['apellidos'] . "<br>";
            echo "Matricula: " . $_POST['matricula'] . "<br>";
            echo "Curso: " . $_POST['curso'] . "<br>";
            echo "Precio: " . $_POST['precio'] . "<br>";
            }
            echo '<br><a href="">Atras</a>';
            ?>
    </body>   
</html>
