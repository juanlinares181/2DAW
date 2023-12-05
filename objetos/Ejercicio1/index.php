<?php

require_once 'Gato.php';
require_once 'Perro.php';
require_once 'Canario.php';
require_once 'Pinguino.php';
require_once 'Lagarto.php';

// Crear instancias de las clases
$gato = new Gato("Ramses", "Egipcio");
$perro = new Perro("Adolf", "Rottweiler");
$canario = new Canario("Piolín", "Amarillo");
$pinguino = new Pinguino("Skipper", "Nadador rápido");
$lagarto = new Lagarto("Komodo", "Escamas rugosas");

// Llamar a métodos específicos de cada clase
echo $gato->maullar() . "<br>";
echo $perro->ladrar() . "<br>";
echo $canario->cantar() . "<br>";
echo $pinguino->nadar() . "<br>";
echo $lagarto->tomarSol() . "<br>";

// También puedes acceder a propiedades específicas
echo "Raza del perro: " . $perro->getRaza() . "<br>";
echo "Color del plumaje del canario: " . $canario->getColorPlumaje() . "<br>";
echo "Tipo de nado del pingüino: " . $pinguino->getTipoNado() . "<br>";
echo "Tipo de escamas del lagarto: " . $lagarto->getTipoEscamas() . "<br>";