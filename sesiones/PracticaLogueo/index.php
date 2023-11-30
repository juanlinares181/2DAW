<?php
session_start();

// Verificación de intentos
if (!isset($_COOKIE['intentos'])) {
    setcookie("intentos", 3);
}

try {
    $pdo = new PDO('mysql:host=localhost;dbname=tema4_logueo;charset=utf8mb4', 'dwes', 'abc123.');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

if ($_COOKIE['intentos'] && $_COOKIE['intentos'] == 0) {
    header("Location:intentos.php");
}

if (isset($_POST['entrar'])) {
    try {
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];

        $stmt = $pdo->prepare("SELECT pass FROM perfil_usuario WHERE user = ?");
        $stmt->bindParam(1, $usuario);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row && password_verify($password, $row['pass'])) {
            $_SESSION['intentos'] = 3;
            // Agregar el nombre de usuario a la sesión
            $_SESSION['usuario'] = $usuario;
            header("Location: inicio.php");
            exit();
        } else {
            if ($_COOKIE['intentos'] > 0) {
                setcookie("intentos", $_COOKIE['intentos'] - 1);
                echo "Usuario: " . $usuario . "<br>";
                echo "Contraseña proporcionada: " . $password . "<br>";
                echo "Contraseña almacenada: " . $row['pass'] . "<br>";
                echo "Contraseña incorrecta. Intentos restantes: " . $_COOKIE['intentos'];
            } else {
                header("Location:intentos.php");
            }
        }
    } catch (PDOException $ex) {
        die($ex->getMessage());
    }
}
?>


<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>INDEX</title>
        <style>
            fieldset {
                position: absolute;
                left: 50%;
                top: 50%;
                width: 230px;
                margin-left: -115px;
                height: 300px;
                margin-top: -150px;
                padding:10px;
                border:1px solid #ccc;
                background-color: #eee;
            }

            legend {
                font-family : Arial, sans-serif;
                font-size: 1.3em;
                font-weight:bold;
                color:#333;
            }

            input[type="text"], input[type="password"] {
                font-family : Arial, Verdana, sans-serif;
                font-size: 0.8em;
                line-height:140%;
                color : #000;
                padding : 3px;
                border : 1px solid #999;
                height:18px;
                width:220px;
            }

            input[type="submit"] {
                width:160px;
                height:30px;
                padding-left:0px;
            }

            select {
                font-family : Arial, Verdana, sans-serif;
                font-size: 0.8em;
                line-height:140%;
                color : #000;
                padding : 3px;
                border : 1px solid #999;
                height:30px;
                width:220px;
            }

            a {
                font-family: Verdana, Arial, sans-serif;
                font-size: 0.7em;
            }

            div.campo {
                margin-top:8px;
                margin-bottom: 10px;
            }

            span.mensaje {
                font-family: Verdana, Arial, sans-serif;
                font-size: 0.7em;
                color: #009;
                background-color : #ffff00;
            }

            label.etiqueta {
                font-family : Arial, sans-serif;
                font-size:0.8em;
                font-weight: bold;
            }

            label.texto {
                font-family : Arial, Verdana, sans-serif;
                font-size: 1em;
                line-height:140%;
                color : #000;
            }
        </style>
    </head>
    <body>
        <h1 align="center">Formulario de registro</h1>

        <?php
        if (isset($_SESSION['mensaje'])) {
            echo "<p align='center'>" . $_SESSION['mensaje'] . "</p>";
        }
        ?>

        <form method="post" action="" align="center">
            Usuario: <input type="text" name="usuario" required><br><br>
            Contraseña: <input type="password" name="password" required><br><br>
            <input type="submit" name="entrar" value="Entrar">
        </form>
        <form method="post" action="registro.php" align="center">
            <input type="submit" name="registro" value="Registrar"><br>
        </form>
    </body>
</html>