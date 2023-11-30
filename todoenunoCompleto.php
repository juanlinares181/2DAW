<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>TODO EN UNO COMPLETO</title>
    </head>
    <body>
        <?php
        if (!isset($_POST['siguiente']) && !isset($_POST['siguiente2'])) {
            ?>

            <h1 align="center">RELLENA FORMULARIO</h1>
            <form action="" method="POST" align="center"><br>
                Nombre: <input type="text" name="nombre" value="<?php if(isset($_POST['cancelar'])) echo $_POST['nombre']; ?>"><br><br>

                Apellidos: <input type="text" name="apellidos" value="<?php if(isset($_POST['cancelar'])) echo $_POST['apellidos']; ?>"><br><br>

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
                
                <input type="hidden" name="estado" value="<?php if(isset($_POST['estado'])) echo ($_POST['estado']) ?>"> 
                <input type="hidden" name="estudios" value="<?php if(isset($_POST['estudios'])) echo ($_POST['estudios']) ?>"> 
                <input type="hidden" name="edad" value="<?php if(isset($_POST['edad'])) echo ($_POST['edad']) ?>"> 
                <input type="submit" name="siguiente" value="Siguiente">
            </form>

            <?php
        }
        if (isset($_POST['siguiente'])) {
            ?>
            <h1 align="center">SIGUE RELLENANDO DATOS</h1>
            <form action="" method="POST" align="center"><br>
                
                Estado Civil: 
                Soltero: <input type="radio" name="estado[]" value="soltero">
                Casado: <input type="radio" name="estado[]" value="casado"><br>
                
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
                    <option value="">Entre 1 y 14</option>
                    <option value="edad">Entre 14 y 25</option>
                    <option value="edad">Entre 26 y 35</option>
                    <option value="edad">Mas de 35</option>
                </select><br><br>
                
                <input type="hidden" name="aficiones[]" value="<?php echo implode(";", $_POST['aficiones']); ?>">
                <input type="hidden" name="sexo[]" value="<?php echo implode(";", $_POST['sexo']); ?>">
                <input type="hidden" name="nombre" value="<?php echo ($_POST['nombre']) ?>"> 
                <input type="hidden" name="apellidos" value="<?php echo ($_POST['apellidos']) ?>"> 
                <input type="submit" name="siguiente2" value="Siguiente">
            </form>

            <?php
        }
        if (isset($_POST['siguiente2'])) {
            echo "Nombre: " . $_POST['nombre'] . "<br>";
            echo "Apellidos: " . $_POST['apellidos'] . "<br>";
            $sexo = explode(";", $_POST['sexo']);
            echo "Sexo: <br>";
            foreach ($sexo as $valor) {
                echo $valor . "<br>";
            }
            $aficiones = explode(";", $_POST['aficiones']);
            echo "Aficiones: <br>";
            foreach ($aficiones as $valor) {
                echo $valor . "<br>";
            }
            echo "Estado: " . $_POST['estado'] . "<br>";
            foreach ($estudios as $valor) {
               echo $_POST['estudios'] . "<br>";
            }
            
            echo "Edad: " . $_POST['Edad'] . "<br>";
            ?>

            <form action="" method="POST">
                <input type="submit" name="cancelar" value="Cancelar">
            </form>
            <br>
            <form action="" method="POST">
                <input type="submit" name="confirmar" value="Confirmar">
            </form>
    <?php
}
?>
    </body>   
</html>