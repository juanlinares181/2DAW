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

        <form action="" method="POST">
            Codigo: <input type="text" name="codigo"><br><br>
            Nombre: <input type="text" name="nombre"><br><br>
            Apellidos: <input type="text" name="apellidos"><br><br>
            Salario: <input type="text" name="salario"><br><br>
            <input type="checkbox" name="idiomas[]" value="1">Español<br>
            <input type="checkbox" name="idiomas[]" value="2">Inglés<br>
            <input type="checkbox" name="idiomas[]" value="4">Alemán<br>
            <input type="checkbox" name="idiomas[]" value="8">Chino<br>
            <input type="checkbox" name="idiomas[]" value="16">Francés<br><br>
            Estudios:<select multiple="" name="estudios[]"><br>
                <option value="ESO">ESO</option><br>
                <option value="Bachillerato">Bachillerato</option><br>
                <option value="CFGM">CFGM</option><br>
                <option value="CFGS">CFGS</option><br>
            </select><br><br>
            Usuario: <input type="text" name="usu"><br><br>
            Password: <input type="text" name="pass"><br><br>
            <input type="submit" name="guardar" value="Guardar"><br><br>
            <input type="submit" name="recuperar" value="Recuperar"><br>
        </form>
        <?php
        if (isset($_POST['guardar'])) {
            try {
                $conex = new mysqli('localhost', 'dwes', 'abc123.', 'prueba');
                $conex->set_charset('utf8mb4');
                $idio = 0;
                foreach ($_POST['idiomas'] as $value)
                    $idio = $idio + $value;
                $estud = implode("-", $_POST['estudios']);
                $conex->query("INSERT INTO empleados VALUES ($_POST[codigo], '$_POST[nombre]', '$_POST[apellidos]', $_POST[salario], $idio, '$estud', '$_POST[usu]', '$_POST[pass]')");
            } catch (Exception $ex) {
                die($ex->getMessage());
            }
            echo "Registro insertado correctamenete";
            $conex->close();
        }

        if (isset($_POST['recuperar'])) {
            try {
                $conex = new mysqli('localhost', 'dwes', 'abc123.', 'prueba');
                $conex->set_charset('utf8mb4');
                $result = $conex->query("SELECT * FROM empleados WHERE Codigo=2");
            } catch (Exception $ex) {
                die($ex->getMessage());
            } 
            if ($result->num_rows > 0) {
                $reg = $result->fetch_object();
                echo "Nombre: ".$reg->Nombre."<br>";
                echo "Apellidos: ".$reg->Apellidos."<br>";
                echo "Idiomas: ".$reg->Idiomas."<br>";
                echo "Estudios: ".$reg->Estudios."<br>";
            } else {
                echo "No se ha recuperado nada";
            }
            
        }
        ?>


    </body>
</html>