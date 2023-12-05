<?php

require_once './persona.php';
require_once './empleado.php';

$p = new Persona();
echo "numero de personas: " . Persona::getNumPerson() . "<br>";
$p1 = new Persona("pepe", "lopez", 43);

echo "numero de personas: " . Persona::getNumPerson() . "<br>";
unset($p);
Persona::BorrarPersona();
echo "numero de personas: " . Persona::getNumPerson() . "<br>";
echo $p1->nombre . "," . $p1->apellidos . "," . $p1->edad . "<br>";
$p1->nombre = "juan";
echo $p1->nombre . "," . $p1->apellidos . "," . $p1->edad . "<br>";

echo $p1;

/* $p2=$p1;
  $p1->nombre="manolo";
  echo $p1;
  echo $p2;
 */

echo "==================<br>";
echo "numero de personas: " . Persona::getNumPerson() . "<br>";
$p2 = clone($p1);
$p1->nombre = "manolo";
echo "p1:" . $p1;
echo "p2:" . $p2;
echo "numero de personas: " . Persona::getNumPerson() . "<br>";

$p3 = clone($p2);

if ($p3 == $p2) {
    echo "son iguales";
} else {
    echo "son diferentes";
}

$_SESSION['persona'] = $p3;

$_SESSION['persona']->nombre;


echo "==============<br>";
echo "P1: ".$p1;
$p1->modificar("Rosa");
echo "P1: ".$p1;
$p1->modificar("Rosa", "Matamoros");
echo "P1: ".$p1;
$p1->modificar("Rosa", "Matamoros", 69);
echo "P1: ".$p1;

echo "***HERENCIA***";
$emp = new empleado("Pepe", "Salazar", 45, 1666);
echo $emp;
echo $emp->nombre;

$emp_json = json_encode($emp);
var_dump($emp_json);
$emp2 = json_decode($emp_json);
echo $emp2;

?>