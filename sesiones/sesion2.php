<?php
session_start();
setcookie("PHPSESSID", $_COOKIE['PHPSESSID'], time() + 3600);
echo $_SESSION['nombre'];
$_SESSION['nombre'] = "Pepe";
?>
<a href="sesion1.php">Ir a sesion 1</a>
<a href="cerrarSesion.php">Cerrar sesion</a>
