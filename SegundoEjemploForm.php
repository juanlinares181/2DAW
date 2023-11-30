<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Formulario</title>
    </head>
    <body>
        <?php
        $nombre = false;
        $apellidos = false;
        $modulos = false;
        $errores = false;
        if (isset($_POST['enviar'])) {
            
            if (!empty($_POST['nombre'])) {
                $nombre = true;
                $errores = true;
            }
            if (!empty($_POST['apellidos'])) {
                $apellido = true;
                $errores = true;
            }
            if (isset($_POST['modulos'])) {
                $modulos = true;
                $errores = true;
            }
        } 
        if (isset($_POST['enviar']) && $nombre == true && $apellidos == true && $modulos == true) {
            echo "Nombre: ".$_POST['nombre']."<br>";
            echo "Apellidos: ".$_POST['apellidos']."<br>";
           if (isset($_POST['modulos'])) {
                echo "Módulos seleccionados:<br>";
            foreach ($_POST['modulos'] as $value) {
                echo $value."<br>";
            }
          }
        echo '<br><a href="">Atras</a>';
    } else { 
    ?>
        <form action="" method="POST"><br>
        Nombre: <input type="text" name="nombre" value="<?php if ($errores == true && $nombre == false) echo $_POST['nombre']; ?>"> <?php if ($nombre == false && isset(($_POST['enviar']))) echo '<span style=color:red>El nombre no puede estar vacío</span>' ?><br><br>
        Apellidos: <input type="text" name="apellidos" value="<?php if ($errores == true && $apellidos == false) echo $_POST['apellidos']; ?>"> <?php if ($apellidos == false && isset(($_POST['enviar']))) echo '<span style=color:red>El apellido no puede estar vacío</span>' ?><br><br>
        Modulos: <?php if ($errores == true && $modulos == false) echo $_POST['enviar']; if ($modulos == false && isset(($_POST['enviar']))) echo '<span style=color:red>Debe elegir al menos un modulo</span>' ?><br>
        DWES: <input type="checkbox" name="modulos[]" value="DWES" <?php if(isset($_POST['modulos']) && in_array("DWES", $_POST['modulos'])) echo 'checked="checked"'; ?>><br>
        DAWEB: <input type="checkbox" name="modulos[]" value="DAWEB" <?php if(isset($_POST['modulos']) && in_array("DAWEB", $_POST['modulos'])) echo 'checked="checked"'; ?>><br>
        ENIEM: <input type="checkbox" name="modulos[]" value="ENIEM" <?php if(isset($_POST['modulos']) && in_array("ENIEM", $_POST['modulos'])) echo 'checked="checked"'; ?>><br>
        DWEC: <input type="checkbox" name="modulos[]" value="DWEC" <?php if(isset($_POST['modulos']) && in_array("DWEC", $_POST['modulos'])) echo 'checked="checked"'; ?>><br>
        HLC: <input type="checkbox" name="modulos[]" value="HLC" <?php if(isset($_POST['modulos']) && in_array("HLC", $_POST['modulos'])) echo 'checked="checked"'; ?>><br>
        <input type="submit" name="enviar" value="Enviar">
    </form>
    <a href="datosForm.php?nombre=Jesus&apellidos=Serrano"></a>
    
    <?php
    }
    ?>
        
</html>
