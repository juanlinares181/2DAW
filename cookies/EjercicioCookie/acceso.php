<?php
if (isset($_COOKIE['acceso'])) {
    setcookie("acceso", date("d-m-Y, H:i:s"));
    echo "Hola, este es tu primer acceso";
} else {
    setcookie("acceso", date("d-m-Y, H:i:s"));
    echo "Hola tu ultimo acceso fue: ".$_COOKIE['acceso'];
}
?>