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
        <?php
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=dwes', 'dwes', 'abc123.');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            if (isset($_POST['mostrar'])) {
                $producto = $_POST['producto'];
                $stmt = $pdo->prepare("SELECT st.unidades, ti.nombre FROM stock st, tienda ti WHERE st.producto = ? AND st.tienda = ti.cod");
                $stmt->execute([$producto]);
            }
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
        ?>

        <div id="encabezado">
            <h1>Ejercicio 3.1.4</h1>
            <form action="" method="post">
                Producto: <select name="producto">
                    <?php
                    $stmt = $pdo->query("SELECT * FROM producto");
                    while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
                        echo '<option value="' . $row->cod . '"';
                        if (isset($_POST['mostrar']) && $_POST['producto'] == $row->cod) {
                            echo ' selected';
                        }
                        echo '>' . $row->nombre_corto . '</option>';
                    }
                    ?>
                </select>
                <input type="submit" name="mostrar" value="Mostrar Stock">
            </form>
        </div>

        <?php
        if (isset($_POST['mostrar'])) {
            ?>
            <div id="contenido">
                <form action="" method="POST">
                    <?php
                    while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
                        echo 'Tienda ' . $row->nombre . ': ';
                        echo "<input type='text' name='unidades[]' value='{$row->unidades}'>";
                        echo ' unidades<br>';
                    }
                    ?>
                    <input type="submit" name="actualizar" value="Actualizar">
                </form>
            </div>
            <?php
        }

        if (isset($_POST['actualizar'])) {
            // Procesar la actualización aquí
            // Asegúrate de validar y sanitizar los datos antes de actualizar la base de datos
        }
        ?>
    </body>
</html>