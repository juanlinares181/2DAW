<?php
require_once './Producto.php';
if (isset($_POST['insertar'])) {
    $p = new Producto($_POST['codigo'], $_POST['nombre'], $_POST['precio']);
    $result = $p->insertar();
    if ($result == false) {
        echo "ERROR EN LA BASE DE DATOS";
    } else {
        echo "Se han insertado" . $result . " registros";
    }
}
?>
<form action="" method="post">
    Codigo: <input type="text" name="codigo"><br><br>
    Nombre: <input type="text" name="nombre"><br><br>
    Precio: <input type="text" name="precio"><br><br>

    <input type="submit" name="insertar" value="insertar"><br><br>
    <input type="submit" name="mostar" value="mostrar"><br><br>
    <input type="submit" name="buscar" value="buscar"><br><br>
</form>

<br><br><br>

<?php
if (isset($_POST['buscar'])) {
    echo "<form action='' method='POST'>";
    echo "Código del producto: <input type='text' name='cod'><br><br>";
    echo "<input type=submit name='buscarcod' value='Buscar'><br>";
    echo "</form>";
}

if (isset($_POST['buscarcod'])) {
    $p = Producto::buscarProducto($_POST['cod']); // Corregir nombre del método
    if ($p === false) {
        echo "ERROR EN LA BASE DE DATOS";
    } else {
        if ($p) {
            // Modificar para imprimir propiedades específicas del producto o usar un método __toString en la clase Producto
            echo "Codigo: " . $p->codigo . "<br>";
            echo "Nombre: " . $p->nombre . "<br>";
            echo "Precio: " . $p->precio . "<br>";
        } else {
            echo "No existe ese producto";
        }
    }
}

if (isset($_POST['mostrar'])) {
    $products = Producto::recuperarTodos(); // Corregir nombre del método
    if ($products === false) {
        echo "ERROR EN LA BASE DE DATOS";
    } else {
        if ($products) {
            foreach ($products as $product) { // Cambiar nombre de la variable de iteración
                echo "Codigo: " . $product->codigo . "<br>";
                echo "Nombre: " . $product->nombre . "<br>";
                echo "Precio: " . $product->precio . "<br>";
            }
        } else {
            echo "No hay productos para mostrar";
        }
    }
}