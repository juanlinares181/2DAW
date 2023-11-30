<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>TODO EN UNO CANCELAR</title>
    </head>
    <body>
        <?php
        if(!isset($_POST['siguiente']) && !isset($_POST['siguiente2'])) {
        ?>

        <h1 align="center">Formulario</h1>
        <form action="" method="POST" align="center"><br>
            Nombre: <input type="text" name="nombre" value="<?php if(isset($_POST['cancelar'])) echo $_POST['nombre']; ?>"><br><br>
            Apellidos: <input type="text" name="apellidos" value="<?php if(isset($_POST['cancelar'])) echo $_POST['apellidos']; ?>"><br><br>
            Idiomas: <br><br>
            <input type="checkbox" name="idiomas[]" value="Español">Español<br>
            <input type="checkbox" name="idiomas[]" value="Ingles">inglés<br>
            <input type="checkbox" name="idiomas[]" value="Frances">Francés<br>
            <input type="checkbox" name="idiomas[]" value="Aleman">Alemán<br><br>
            <input type="hidden" name="direccion" value="<?php if(isset($_POST['direccion'])) echo ($_POST['direccion']) ?>"> 
            <input type="hidden" name="tarjeta" value="<?php if(isset($_POST['tarjeta'])) echo ($_POST['tarjeta']) ?>"> 
            <input type="submit" name="siguiente" value="Siguiente">
        </form>

        <?php 
        }
        if(isset($_POST['siguiente'])) {
        ?>
        <h1 align="center">MATRICULA</h1>
        <form action="" method="POST" align="center"><br>
            Direccion: <input type="text" name="direccion" value="<?php if(isset($_POST['siguiente'])) ?>"><br><br>
            Nº Tarjeta: <input type="text" name="tarjeta" value="<?php if(isset($_POST['siguiente'])) ?>"><br><br>
            <input type="hidden" name="idiomas" value="<?php echo implode(";", $_POST['idiomas']); ?>">
            <input type="hidden" name="nombre" value="<?php echo ($_POST['nombre']) ?>"> 
            <input type="hidden" name="apellidos" value="<?php echo ($_POST['apellidos']) ?>"> 
            <input type="submit" name="siguiente2" value="Siguiente">
        </form>

        <?php
        }
        if(isset($_POST['siguiente2'])) {
            echo "Nombre: ".$_POST['nombre']."<br>";
            echo "Apellidos: ".$_POST['apellidos']."<br>";
           
            $idiomas = explode(";", $_POST['idiomas']);
            echo "Mis idiomas: <br>";
            foreach ($idiomas as $valor) {
                echo $valor."<br>";
            }
            echo "Direccion: ".$_POST['direccion']."<br>";
            echo "Nº Tarjeta: ".$_POST['tarjeta']."<br>";
            
        
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
