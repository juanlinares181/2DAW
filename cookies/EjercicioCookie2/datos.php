<?php
if (!isset($_COOKIE["nombre"])) {
    header("location:recordaPass.php");
} else {
    setcookie("entrada", date("d-m-Y H:i:s"));
    if (!isset($_COOKIE["entrada"])) {
        print "Es la primera vez que entras, bienvenido, $_COOKIE[nombre] $_COOKIE[apellido]";
    } else {
        print "Bienvenido, $_COOKIE[nombre] $_COOKIE[apellido], tu último acceso fue el $_COOKIE[entrada]";
    }
    setcookie("nombre", "", time() - 60);
    setcookie("apellido", "", time() - 60);
}
?>

<form method="post" action="recordarPass.php">
    <input type="submit" value="Volver">
</form>