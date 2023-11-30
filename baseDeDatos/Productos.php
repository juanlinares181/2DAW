<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>BASE DE DATOS</title>
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
            $conex = new mysqli('localhost', 'dwes', 'abc123.', 'dwes');
            $result = $conex->query("SELECT * FROM producto");
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
        ?>
    </form>
    <div id="encabezado">
        <h1>Ejercicio 3.1.4</h1>
        <form action="" method="post">
            Producto: <select name="producto" >
                <?php
                while ($reg = $result->fetch_object()) {
                    echo '<option value = "'.$reg->cod.'"';
                    if (isset($_POST['mostrarStock']) && $_POST['producto'] == $reg->cod) {
                        echo ' selected';
                    }
                    echo '>'.$reg->nombre_corto.'</option>';
                }
                ?>
            </select> 
            <input type="submit" name="mostrarStock" value="Mostrar Stock">
        </form>
    </div>

    <?php
    if (isset($_POST['mostrarStock'])) {
            try {
                $result = $conex->query("SELECT st.unidades, ti.nombre FROM stock st, tienda ti WHERE st.producto = '".$_POST['producto']."' AND st.tienda = ti.cod");
            } catch (Exception $ex) {
                echo $ex->getMessage();
            }
            ?>
        <div id="contenido">
            <?php
                while ($reg = $result->fetch_object()) {
                    echo 'Tienda: '.$reg->nombre.': '.$reg->unidades.' unidades<br>';
                }
            ?>
        </div>
    <?php
    }
    ?>
    <div id="pie">

    </div>
</body>   
</html>