<?php

try {
    $conex = new mysqli('localhost', 'dwes', 'abc123.', 'dwes');

    // $stmt = $conex->prepare("INSERT INTO tienda (nombre, tlf) VALUES (?, ?)");
    $stmt = $conex->prepare("SELECT nombre_corto, PVP FROM producto WHERE PVP > ?");
} catch (Exception $ex) {
    die($ex->getMessage());
}

// $nombre = "SUCURSAL3";
// $tlf = 123456789;
/* $tienda = array(
    array("nombre" => "SUCURSAL3", "tlf" => 123456789),
    array("nombre" => "SUCURSAL4", "tlf" => 123456789),
    array("nombre" => "SUCURSAL5", "tlf" => 123456789),
    array("nombre" => "SUCURSAL6", "tlf" => 123456789)
);


foreach ($tiendas as $fila) {
    $stmt->bind_param('si', $fila['nombre'], $fila['tlf']);

    try {
        $stmt->execute();
        echo "Registro insertado";
    } catch (Exception $ex) {
        echo "ERROR";
    }
}*/

$precios = array(100, 200, 30, 400);
foreach ($precios as $value) {
    $stmt->bind_param('i', $values);
    $stmt->execute();
    $result = $stmt->get_result();
    echo "PRODCUTOS MAYORES DE ".$value." euros<br>";
    echo "==============================<br>";
    while ($fila = $result->fetch_object()) {
        echo $fila->nombre." - ".$fila->descripcion." - ".$fila->precio."<br><br>";
    }
}


try {
    $conex = new mysqli('localhost', 'dwes', 'abc123.', 'dwes');
} catch (Exception $ex) {
    
}