<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>DATOS</title>
    </head>
    <body>
    
        <h1 align="center">DATOS DE MATRICULA</h1>
        <form action="formCancela.php" method="POST" align="center">
           <?php
            echo "Nombre: ".$_POST['nombre']."<br>";
            echo "Apellidos: ".$_POST['apellidos']."<br>";
            echo "Matricula: ".$_POST['matricula']."<br>";
            echo "Curso: ".$_POST['curso']."<br>";
            echo "Precio: ".$_POST['precio']."<br>";
            ?><br>
            
            <input type="submit" name="confirmar" value="Confirmar">
        </form><br>
        <form action="formCancela.php" method="POST" align="center">
            <input type="submit" name="cancelar" value="Cancelar">
        </form>
   </body>   
</html>