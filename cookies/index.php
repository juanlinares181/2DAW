<?php
ob_start();
for ($i = 0; $i < 100;$i++) {
    
?>
<h1>HOLAAAAAAAAAAA</h1>
<?php

}
if (isset($_COOKIE['nombre'])) {
setcookie("nombre", "antonio", time()+60);
} else {
  echo $_COOKIE['nombre'];
}
?>

<br><a href="cookie2.php">Ir a siguiente</a>