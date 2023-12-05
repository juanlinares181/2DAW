<?php
if (isset($_POST['subir'])) {
    echo "Nombre original: ".$_FILES['foto']['name']."<br>";
    echo "Nombre temporal: ".$_FILES['foto']['tmp_name']."<br>";
    echo "Tamño: ".$_FILES['foto']['size']."<br>";
    echo "Tipo: ".$_FILES['foto']['type']."<br>";
    echo "Error: ".$_FILES['foto']['error']."<br>";
    if (is_uploaded_file($_POST['foto']['tmp_name'])) {
        $fich = $time()."-".$_FILES['fotos']['name'];
        $ruta = "fotos/".$fich;
        move_uploaded_file($_POST['fotos']['tmp_name'], $ruta);
        try {
            $conex = new mysqli('localhost', 'dwes', 'abc123.', 'ficheros');
            $conex->query("INSERT INTO fotos (nombre, ruta) VALUES('$_POST[nombre]','$ruta')");
            $conex->close();
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
    } else {
        echo "ERROR AL SUBIR EL FICHERO";
    }
}

?>

<form action="" method="POST" enctype="multipart/form-data">
    Fichero: <input type="file" name="foto" value="Seleccionar Fichero"><br>
    <input type="submit" name="subir" value="Subir Fichero">
    <input type="submit" name="mostrar" value="Mostrar Fichero">
</form>

<?php
if (isset($_POST['mostrar'])) {
    try {
       $conex = new mysqli('localhost', 'dwes', 'abc123.', 'ficheros');
       $result = $conex->query("SELECT * FROM fotos");
       if ($result->num_rows) {
           while ($reg = $result->fetch_object()) {
               echo "<a href='mostrar.php?ruta=".$reg->ruta."'><img src='".$reg->ruta."' width=50 height=50></a>";
           }
       } else {
           echo "No hay fotos en la BD";
       }
    } catch (Exception $ex) {
        die ($ex->getMessage());
    }
}
?>
