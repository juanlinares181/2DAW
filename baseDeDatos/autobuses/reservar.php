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
            <h1 align="center">Autobuses</h1><br>
            <?php
            $opt = array(pdo::ATTR_ERRMODE, pdo::ERRMODE_EXCEPTION);
            $con = new PDO("mysql:host=localhost;dbname=autobuses;charset=utf8mb4", "dwes", "abc123.", $opt);
            $result1 = $con->query("select distinct Origen from viajes");
            $result2 = $con->query("select distinct Destino from viajes");
            ?>

            <form action="" method="post" align="center">
                Fecha: <input type="date" name="fecha" value=""><br>
                Origen:<select name="origen">
                    <?php
                    while ($reg = $result1->fetchObject()) {

                        echo "<option value='$reg->Origen'>$reg->Origen</option>";
                    }
                    ?>
                </select> <br>

                Destino:<select name="destino">
                    <?php
                    while ($reg = $result2->fetchObject()) {

                        echo "<option value='$reg->Destino'>$reg->Destino</option>";
                    }
                    ?>
                </select> <br>
                <button name="consultar">Consultar</button>
            </form>

            <?php
            if (isset($_POST["consultar"])) {
                $result = $con->query("Select * from viajes where Fecha='$_POST[fecha]' and Origen='$_POST[origen]' and Destino='$_POST[destino]'");
                if ($result->rowCount()) {
                    $reg = $result->fetchObject();
                    ?>
                    <form action="" method="post">
                        Fecha: <input type="date" name="fecha" readonly="true" value="<?php echo $_POST["fecha"]; ?>"><br>
                        Origen: <input type="text" name="origen" readonly="true" value="<?php echo $_POST["origen"]; ?>"><br>
                        Destino: <input type="text" name="destino" readonly="true" value="<?php echo $_POST["destino"]; ?>"><br>         
                        Plazas Libres: <input type="number" name="plazas_libres" readonly="true" value="<?php echo $reg->Plazas_libres; ?>"><br>
                        Plazas a Reservar <input type="number" name="plazas_reserva"><br>
                        <button name="reservar">Reservar</button>
                    </form>


                    <?php
                } else
                    echo "No hay viaje";
            }

            if (isset($_POST["reservar"])) {
                if ($_POST["plazas_libres"] > $_POST["plazas_reserva"]) {
                    try {
                        $con->exec("update viajes set Plazas_libres = Plazas_libres-$_POST[plazas_reserva] where Origen = '$_POST[origen]' and Destino = '$_POST[destino]' and Fecha= '$_POST[fecha]'");
                    } catch (PDOException $ex) {
                        die($ex->getMessage());
                    }
                    echo "Reserva realizada correctamente";
                } else {
                    echo "El número de plazas reservadas no puede ser mayor a las libres";
                }
            }
            ?>

    </body>
</html>
