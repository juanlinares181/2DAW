<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}

try {
    $pdo = new PDO('mysql:host=localhost;dbname=tema4_logueo;charset=utf8mb4', 'dwes', 'abc123.');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

// Obtener datos del usuario actual
$usuario = $_SESSION['usuario'];
$stmt = $pdo->prepare("SELECT * FROM perfil_usuario WHERE user = ?");
$stmt->execute([$usuario]);
$userInfo = $stmt->fetch(PDO::FETCH_ASSOC);

// Verificar si se encontró la información del usuario
if (!$userInfo) {
    die('Error al recuperar la información del usuario.');
}

// Personalizar el estilo de la página con la información del usuario
$colorLetra = $userInfo['color_letra'];
$colorFondo = $userInfo['color_fondo'];
$tipoLetra = $userInfo['tipo_letra'];
$tamanoLetra = $userInfo['tam_letra'];

?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>INICIO DE SESION</title>
        <style>
            body {
                color: <?php echo $color_letra ?>;
                background-color: <?php echo $color_fondo ?>;
                font-family: <?php echo $tipo_letra ?>;
                font-size: <?php echo $tam_letra ?>;
            }
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
        <h1 align="center">Tus Datos Son:</h1>

        <?php
        // Mostrar los datos del usuario
        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<p align='center'>Nombre: " . $row['nombre'] . "</p>";
            echo "<p align='center'>Apellidos: " . $row['apellidos'] . "</p>";
            echo "<p align='center'>Dirección: " . $row['direccion'] . "</p>";
            echo "<p align='center'>Localidad: " . $row['localidad'] . "</p>";
            echo "<p align='center'>Usuario: " . $row['user'] . "</p>";
            echo "<p align='center'>Contraseña: " . $row['pass'] . "</p>";
            echo "<p align='center'>Color de letra: " . $row['color_letra'] . "</p>";
            echo "<p align='center'>Color de fondo: " . $row['color_fondo'] . "</p>";
            echo "<p align='center'>Tipo de letra: " . $row['tipo_letra'] . "</p>";
            echo "<p align='center'>Tamaño de letra: " . $row['tam_letra'] . "</p>";
        } else {
            echo "<p align='center'>No se encontraron datos para el usuario.</p>";
        }
        ?>

        <form method="post" action="inicio.php" align="center">
            <input type="submit" name="volver" value="Volver">
        </form>

        <form method="post" action="inicio.php" align="center">
            <input type="submit" name="cerrar_sesion" value="Cerrar Sesión">
        </form>
</html>

