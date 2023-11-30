<?php
echo "<br>PRIMERA<br>";
$pass = "Antonio1234";
$hash_md5($pass);
echo $hash_md5."<br>";
$hash_password = password_hash($pass, PASSWORD_DEFAULT);
echo $hash_password."<br>";

echo "<br>SEGUNDA<br>";
$hash_md5($pass);
echo $hash_md5."<br>";
$hash_password = password_hash($pass, PASSWORD_DEFAULT);
echo $hash_password."<br>";

echo "<br>COMPROBACION MD5<br>";
$pass_usu = "Antonio1234";
if ($md5($pass_usu)== $hash_md5) 
    echo "HAS ENTRADO<br>";
else 
    echo "INCORRECTA";
