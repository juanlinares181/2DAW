<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>CALCULA</title>
    </head>
    <body>

        <h1 align="center">INTRODUZCA NUMERO DE FILAS O COLUMNAS</h1>
        <form action="" method="POST" align="center">
            
            Filas: <input type="text" name="filas"><br><br>
            Columnas: <input type="text" name="columnas"><br><br>
            <input type="hidden" name="opcion" value="<?php echo $_GET['op']; ?>">
            <input type="submit" value="Enviar">
        </form>
        <br>
        

        <?php
        require_once './funciones.php';
        if (isset($_GET['enviar'])) {
            
        }
        if (isset($_POST['opt'])) {
        if (isset($_POST['enviar'])) {
            $matriz = crearMatriz($_POST['filas'], $_POST['columnas']);
            echo count($matriz);
            echo count($matriz[0]);
            muestraMatriz($matriz);
            switch ($_POST['opcion']) {
             case 1:
               $sumFilas = sumFilas($matriz);
                 foreach ($sumFilas as $ind => $valor) {
                    echo "La suma de la fila $ind: $valor";
                 }
             break;
             case 2:
                 
             break;
             case 4:
                if ($_POST['fila'] = $_POST['columna']) {
                    
                } else {
                    
                }
             break;
             
            default:
            } 
            
        }
        echo '<a href="index.php">Volver al inicio</a>';
        }
        
        else {
            
        }
        ?>
    </body>   
</html>

<?php
                
            ?>