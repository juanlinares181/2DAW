<?php

require_once 'Bicicleta.php'; // Incluir las definiciones de las clases
require_once 'Coche.php';

// Crear instancias de Bicicleta y Coche
$bicicleta = new Bicicleta('MarcaBici', 'ModeloBici', 2022, 'TipoBici');
$coche = new Coche('MarcaCoche', 'ModeloCoche', 2022, 4);

// Realizar algunas acciones específicas
echo "<p>" . $bicicleta->pedalear() . "</p>";
echo "<p>" . $bicicleta->hacerCaballito() . "</p>";

echo "<p>" . $coche->conducir() . "</p>";
echo "<p>" . $coche->quemarRueda() . "</p>";

// Ver el kilometraje
echo "<p>Kilometraje de la bicicleta: " . $bicicleta->getKmRecorridos() . " km</p>";
echo "<p>Kilometraje del coche: " . $coche->getKmRecorridos() . " km</p>";
echo "<p>Kilometraje total: " . Vehiculo::getKmTotales() . " km</p>";

// Recorrer algunos kilómetros con los vehículos
echo "<p>" . $bicicleta->recorrerKm(20) . "</p>";
echo "<p>" . $coche->recorrerKm(50) . "</p>";

// Ver el kilometraje actualizado
echo "<p>Kilometraje de la bicicleta: " . $bicicleta->getKmRecorridos() . " km</p>";
echo "<p>Kilometraje del coche: " . $coche->getKmRecorridos() . " km</p>";
echo "<p>Kilometraje total: " . Vehiculo::getKmTotales() . " km</p>";
?>
