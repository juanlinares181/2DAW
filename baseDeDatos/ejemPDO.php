<?php
try {
   /* $conex = new PDO('mysql:host=localhost;dbname=dwes;charset=utf8mb4','dwes','abc123.');
    $conex->beginTransaction();
    $reg = $conex->exec('UPDATE stock SET unidades = 200 WHERE producto = "3DSNG"');
    $reg2 = $conex->exec('UPDATE stock SET unidades = 200 WHERE producto = "ACERAX3950"');
    $conex->commit();*/
    $result = $conex->query("SELECT * FROM producto");
} catch (PDOException $ex) {
    die($ex->getMessage());
    // $conex->rollback();
}

// echo "filas afectadas".$reg." - ".$reg2;
if ($result->rowcount()) {
    while ($fila = $result->fetchObject()) {
        echo "Codigo: ".$fila->cod."<br>";
        echo "Nombre: ".$fila->nombre."<br>";
        echo "Precio: ".$fila->precio."<br>";
        echo "================<br>";
    }
}