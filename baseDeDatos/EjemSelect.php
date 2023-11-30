<?php
try {
    $conex = new mysqli('localhost', 'dwes', 'abc123.', 'dwes');
} catch (Exception $ex) {
    die($ex->getMessage());
}

try {
  $result = $conex->query("SELECT * FROM producto");
  echo $result->num_rows;
  $fila = $result->fetch_array();
  echo $fila[0]."-".$fila['nombre_corto'];
} catch (Exception $ex) {
    echo $ex->getMessage();
}
