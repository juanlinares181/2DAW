<?php
session_name('Mi Web');
session_start();
if (isset($_SESSION['nombre'])) {
    echo $_SESSION['nombre'];
$_SESSION['nombre'] = "Antonio";
$_SESSION['apellidos'] = "Del Pantano";
echo $_SESSION['nombre'];
echo $_SESSION['apellidos'];
}
?>
<br>
<a href="sesion2.php">Ir a sesion 2</a>

