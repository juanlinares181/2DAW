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
        $errors = array(); // Array para almacenar mensajes de error

        if (isset($_POST['enviar'])) {
        echo "Nombre: ".$_POST['nombre']."<br>";
        echo "DNI: ".$_POST['dni']."<br>";
        echo "Fecha de Nacimiento: ".$_POST['fechaNac']."<br>";
        echo "Email: ".$_POST['email']."<br>";
        echo "Edad: ".$_POST['edad']."<br>";
        if (isset($_POST['modulos'])) {
            echo "Módulos seleccionados:<br>";
            foreach ($_POST['modulos'] as $value) {
                echo $value."<br>";
            }
        }
        echo '<br><a href="">Atras</a>';
        }
        
        if (isset($_POST['enviar'])) {
            // Validación del campo Nombre
            if (!preg_match('/^[A-Za-z\s]{1,30}$/', $_POST['nombre'])) {
                $errors[] = "El campo Nombre debe contener solo letras y espacios, con un máximo de 30 caracteres.";
            }
            
            // Validación del campo DNI
            if (!preg_match('/^\d{8}-[a-zA-Z]$/', $_POST['dni'])) {
                $errors[] = "El campo DNI debe tener el formato 12345678-L (8 dígitos y una letra).";
            }

            // Validación de Fecha de Nacimiento
            if (!preg_match('/^\d{2}-\d{2}-\d{4}$/', $_POST['fechaNac']) || !strtotime($_POST['fechaNac'])) {
                $errors[] = "La Fecha de Nacimiento no es válida (formato dd-mm-aaaa y fecha existente).";
            }

            // Validación del campo Email
            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) || !preg_match('/@.*\.com$/', $_POST['email'])) {
                $errors[] = "El campo Email debe ser una dirección de correo válida con formato nombre@dominio.com.";
            }

            // Validación del campo Edad
            if (!preg_match('/^\d{2,3}$/', $_POST['edad']) || $_POST['edad'] <= 18) {
                $errors[] = "La Edad debe ser un número mayor de 18.";
            }

            if (isset($_POST['modulos'])) {
                echo "Módulos seleccionados:<br>";
                foreach ($_POST['modulos'] as $value) {
                    echo $value . "<br>";
                }
            }

            // Mostrar errores
            if (!empty($errors)) {
                foreach ($errors as $error) {
                    echo $error . "<br>";
                }
                echo '<br><a href="">Atrás</a>';
            }
        } else {
        ?>
        <form action="" method="POST">
            Nombre: <input type="text" name="nombre" value="<?php if (!empty($_POST['nombre'])) echo $_POST['nombre']; ?>"><br><br>
            DNI: <input type="text" name="dni" value="<?php if (!empty($_POST['dni'])) echo $_POST['dni']; ?>"><br><br>
            Fecha de Nacimiento: <input type="text" name="fechaNac" value="<?php if (!empty($_POST['fechaNac'])) echo $_POST['fechaNac']; ?>"><br><br>
            Email: <input type="text" name="email" value="<?php if (!empty($_POST['email'])) echo $_POST['email']; ?>"><br><br>
            Edad: <input type="text" name="edad" value="<?php if (!empty($_POST['edad'])) echo $_POST['edad']; ?>"><br><br>
            <input type="submit" name="enviar" value="Enviar">
        </form>
        <?php
        
        }
        ?>
    </body>
</html>

