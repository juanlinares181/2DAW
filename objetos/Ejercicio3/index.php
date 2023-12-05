<?php
require_once 'DadoPoker.php';

$dado = new DadoPoker();

// Realizar una tirada
$caraObtenida = $dado->tira();

// Mostrar la última tirada
echo "La cara obtenida es: $caraObtenida\n <br>";

// Mostrar el nombre de la última figura
echo $dado->nombreFigura() . "\n <br>";

// Realizar otra tirada (solo para propósitos de ejemplo)
$dado->tira();

// Mostrar el número total de tiradas
echo "Número total de tiradas: " . $dado->getTiradasTotales() . "\n <br>";

?>