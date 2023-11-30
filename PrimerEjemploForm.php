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
    if (isset($_POST['enviar'])) {
        if (!empty($_POST['nombre'])) {
            // Aquí puedes realizar alguna acción si el nombre no está vacío
        }
        
        if (!empty($_POST['apellidos'])) {
            // Aquí puedes realizar alguna acción si los apellidos no están vacíos
        }
        
        if (isset($_POST['modulos']) && in_array("DWES", $_POST['modulos'])) {
            // Aquí puedes realizar alguna acción si 'DWES' está seleccionado
        }
        
        if (isset($_POST['modulos']) && in_array("DAWEB", $_POST['modulos'])) {
            // Aquí puedes realizar alguna acción si 'DAWEB' está seleccionado
        }
        
        if (isset($_POST['modulos']) && in_array("ENIEM", $_POST['modulos'])) {
            // Aquí puedes realizar alguna acción si 'ENIEM' está seleccionado
        }
        
        if (isset($_POST['modulos']) && in_array("DWEC", $_POST['modulos'])) {
            // Aquí puedes realizar alguna acción si 'DWEC' está seleccionado
        }
        
        if (isset($_POST['modulos']) && in_array("HLC", $_POST['modulos'])) {
            // Aquí puedes realizar alguna acción si 'HLC' está seleccionado
        }
    } else {
    
    if (isset($_POST['enviar'])) {
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
        Nombre: <input type="text" name="nombre" value="<?php if(!empty($_POST['nombre'])) echo $_POST['nombre']; ?>"><br>
        <?php if(!empty($_POST['nombre'])) echo '<span style=color:red>El nombre no puede estar vacío</span>' ?><br>
        Apellidos: <input type="text" name="apellidos" value="<?php if(!empty($_POST['apellidos'])) echo $_POST['apellidos']; ?>"><br>
        <?php if(!empty($_POST['apellidos'])) echo '<span style=color:red>El apellido no puede estar vacío</span>' ?>
        Modulos: <?php if (isset($_POST['modulos'])) echo '<span style=color:red>Debe elegir al menos un módulo</span>' ?><br>
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
        <form action="" method="POST"><br>
            Nombre: <input type="text" name="nombre" value=""><br>
            Apellidos: <input type=text name="apellidos" value=""><br>
            DWES: <input type="checkbox" name="modulos[]" value="DWES"><br>
            DAWEB: <input type="checkbox" name="modulos[]" value="DAWEB"><br>
            ENIEM: <input type="checkbox" name="modulos[]" value="ENIEM"><br> 
            DWEC: <input type="checkbox" name="modulos[]" value="DWEC"><br>
            HLC: <input type="checkbox" name="modulos[]" value="HLC"><br>
        </form>
        <?php
    }
        ?>
        

    </body>
</html>