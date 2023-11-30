<?php

$a = [5, "Pepe", 27.5, "Martinez"];
$a['codigo'] = 1;
$a['nombre'] = "Pepote";
$a['salario'] = 3000;
$a['apellidos'] = "Martinez Soria";

$a = array(75 => 1, "nombre" => "Pepote", 35 => 27.5, 4 => "Martinez Soria");

foreach ($a as $ind => $valor) {
    echo $ind.":".$valor."<br>";
}

print_r($a);
echo "<br>";
$a[9] = "Lucerda";
print_r($a);
$a[4] = "Juego de los muertos";
print_r($a);


$a[4][5] = 0;
$a[][] = 1;
print_r($a);   