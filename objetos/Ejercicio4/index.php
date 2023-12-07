<?php
require_once 'Zona.php';

// Crear instancias de las zonas
$salaPrincipal = new Zona("Sala Principal", 1000);
$compraVenta = new Zona("Compra-Venta", 200);
$vip = new Zona("VIP", 25);

// Programa principal
echo $salaPrincipal . "\n";
echo $compraVenta . "\n";
echo $vip . "\n";

// Vender algunas entradas
$salaPrincipal->vender(500);
$compraVenta->vender(150);
$vip->vender(30);

// Mostrar información actualizada
echo $salaPrincipal . "\n";
echo $compraVenta . "\n";
echo $vip . "\n";

?>