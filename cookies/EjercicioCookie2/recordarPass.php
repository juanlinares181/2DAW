<?php

if (isset($_COOKIE['registrado'])) {
    setcookie("registrado", "si", time() - 60);
    print "USuario registrado correctamente";
}

try {
        $pdo = new PDO("mysql:host=localhost;dbname=recordar;charset=utf8mb4", "dwes", "abc123.");
        $result = $conex->query("SELECT * FROM users WHERE usuario = '$_POST[us]'");
        if ($fila = $result->fetchObject()) {
            if (password_verify($_POST["pass"], $fila->password)) {
                setcookie("nombre", $fila->Nombre);
                setcookie("apellido", $fila->Apellidos);
                if ($_POST["recordar"]) {
                    setcookie("usuario", $_POST["us"]);
                    setcookie("clave", $_POST["pass"]);
                    setcookie("recordarCheck", 1);
                } else {
                    setcookie("usuario", $_POST["us"], time() - 60);
                    setcookie("clave", $_POST["pass"], time() - 60);
                    setcookie("recordarCheck", 1, time() - 60);
                }
                header("location:datos.php");
            } else {
                $datoInc = "Contraseña incorrecta";
            }
        } else {
            $datoInc = "Usuario incorrecto";
        }
    } catch (PDOException $exc) {
        echo $exc->getMessage();
    }
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>RECORDAR PASSS</title>
    </head>
    <body>

    <form action="" method="post">
    Usuario: <input type="text" name="us" value="<?php
    if (isset($_COOKIE["recordarCheck"])) {
        print $_COOKIE["usuario"];
    }
    ?>"><br>
    Contraseña: <input type="text" name="pass" value="<?php
    if (isset($_COOKIE["recordarCheck"])) {
        print $_COOKIE["clave"];
    }
    ?>"><br>
    Recordarme <input type="checkbox" name="recordar" <?php
    if (isset($_COOKIE["recordarCheck"])) {
        print "checked";
    }
    ?>><br>
    <input type="submit" name="enviar" value="Acceder">
</form>
<form action="registro.php" method="post">
    <input type="submit" name="registro" value="Registrarse">
</form>

<?php
if (isset($datoInc)) {
    print $datoInc;
}
?>
    </body>
</html>



