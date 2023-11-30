<?php
require_once 'funciones.php';
echo "Pagina pricipal ";
$s = 1000;
$c = 200;
$r = 500;

$nom = nomina($s, $c, $r);
echo $nom."<br>";
echo $s;
?>
