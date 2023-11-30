<?php

try {
    $conex = new mysqli('localhost', 'dwes', 'abc123.', 'dwes');
} catch (Exception $ex) {
    die($ex->getMessage());
}
$conex->set_charset('utf8mb4');
$conex->autocommit(false);

try {
    $error1 = $conex->query("UPDATE stock SET unidades=unidades-1 WHERE producto='3DSNG' AND tienda=1");
    $error2 = $conex->query("INSERT INTO stock VALUES('3DSNG',3,1)");
    $conex->commit();
    echo "TODO CORRECTO";
} catch (Exception $ex) {
    $conex->rollback();
    echo "ERROR";
}
$conex->autocommit(true);
$conex->close();