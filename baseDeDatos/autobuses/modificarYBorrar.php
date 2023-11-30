<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <link href="dwes.css" rel="stylesheet" type="text/css">
        <meta charset="UTF-8">
        <title></title>
        <style type="text/css">
            h1 {
                margin-bottom:0;
                background-color: khaki;
            }
            #encabezado {
                background-color: khaki;
            }
            #contenido {
                background-color: khaki;
                height:600px;
            }
            #pie {
                background-color: khaki;
                color:#ff0000;
                height:30px;
            }
        </style>
    </head>
    <body>
        <div id="contenido">
            <a href="menu.php">Menú</a><br><br>
            <h1 align="center">Modificar o Borrar un Viaje</h1><br>

            <?php
            error_reporting(0);
            try {
                $opt = array(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $conex = new PDO("mysql:host=localhost;dbname=autobuses;charset=utf8mb4", "dwes", "abc123.", $opt);

                if (isset($_POST["borrar"])) {
                    try {
                        $conex->exec("DELETE FROM viajes WHERE Matricula='$_POST[matricula]' and Fecha='$_POST[fecha]' and Origen='$_POST[origen]' and Destino='$_POST[destino]'");
                    } catch (PDOException $ex) {
                        die($ex->getMessage());
                    }
                    $borrado = true;
                }

                if (isset($_POST["modificar"])) {
                    try {
                        $result = $conex->query("SELECT Num_plazas FROM autos WHERE Matricula ='$_POST[matricula]'");
                        $reg = $result->fetchObject();
                        if ($reg->Num_plazas < $_POST["plazas"])
                            $modificado = "Error: El número de plazas es mayor que el número de plazas del autobus";
                        else {
                            $conex->exec("UPDATE viajes SET Fecha = '$_POST[fecha]' , Matricula='$_POST[matricula]', Origen='$_POST[origen]', Destino ='$_POST[destino]', Plazas_libres=$_POST[plazas] where Matricula='$_POST[matriculaA]' and Fecha='$_POST[fechaA]' and Origen='$_POST[origenA]' and Destino='$_POST[destinoA]'");
                            $modificado = " El viaje modificado correctamente";
                        }
                    } catch (PDOException $ex) {
                        die($ex->getMessage());
                    }
                }

                $result = $conex->query("SELECT * FROM viajes");
            } catch (PDOException $ex) {
                die($ex->getMessage());
            }

            echo "<table border=1 align='center'>";
            echo "<tr><td>Fecha</td><td>Matrícula</td><td>Origen</td><td>Destino</td><td>Plazas</td><td>Operaciones</td></tr>";
            while ($reg = $result->fetchObject()) {
                echo "<tr><td>$reg->Fecha</td>"
                . "<td>$reg->Matricula</td>"
                . "<td>$reg->Origen</td>"
                . "<td>$reg->Destino</td>"
                . "<td>$reg->Plazas_libres</td>";
                ?>
                <td>
                    <form action="" method="post" align="center">
                        <input type="hidden" name="fecha" value="<?php echo $reg->Fecha; ?>">
                        <input type="hidden" name="matricula" value="<?php echo $reg->Matricula; ?>"> 
                        <input type="hidden" name="origen" value="<?php echo $reg->Origen; ?>"> 
                        <input type="hidden" name="destino" value="<?php echo $reg->Destino; ?>"> 
                        <input type="hidden" name="plazas" value="<?php echo $reg->Plazas_libres; ?>"> 
                        <button name='borrar'>Borrar</button>
                        <button name='modificar'>Modificar</button>
                    </form>
                </td>
            </tr>
            <?php
        }
        echo "</table>";

        if (isset($_POST["borrar"]) && $borrado)
            echo "El viaje se ha borrado correctamente";
        if (isset($_POST["modificar"])) {
            ?>
            <form action="" method="post" align="center">
                Fecha: <input type="date" name="fecha" value="<?php echo $_POST["fecha"]; ?>"><br><br>
                Matricula:<select name="matricula"><br><br>
                    <?php
                    $result = $conex->query("SELECT Matricula FROM autos");
                    while ($reg = $result->fetchObject()) {
                        if ($_POST["matricula"] == $reg->Matricula)
                            echo "<option value='$reg->Matricula' selected>$reg->Matricula</option>";
                        else
                            echo "<option value='$reg->Matricula'>$reg->Matricula</option>";
                    }
                    ?>
                </select> <br><br>
                Origen: <input type="text" name="origen" value="<?php echo $_POST["origen"]; ?>"><br><br>
                Destino: <input type="text" name="destino" value="<?php echo $_POST["destino"]; ?>"><br><br>
                Plaza: <input type="number" name="plazas" value="<?php echo $_POST["plazas"]; ?>"><br><br>

                <input type="hidden" name="fechaA" value="<?php echo $_POST["fecha"]; ?>">
                <input type="hidden" name="matriculaA" value="<?php echo $_POST["matricula"]; ?>"> 
                <input type="hidden" name="origenA" value="<?php echo $_POST["origen"]; ?>"> 
                <input type="hidden" name="destinoA" value="<?php echo $_POST["destino"]; ?>">

                <button name="modificar">Modificar</button>
            </form>
            <?php
        }
        ?>

</body>
</html>

