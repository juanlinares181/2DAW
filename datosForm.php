<?php
if (isset($_POST['enviar'])) {
    echo "Nombre: ".$_POST['nombre']."<br>";
    echo "Apellidos: ".$_POST['apellidos']."<br>";
    foreach ($_POST['modulos'] as $value) {
        echo "<br>".$value;
    }
    ?>
   <br>
    <a href="PrimerEjemploForm.php">Atras</a>

    <?php
} else {
    header("Location:PrimerEjemploForm.php");
}
?>