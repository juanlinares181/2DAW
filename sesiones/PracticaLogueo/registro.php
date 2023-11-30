<?php
// Inicio de la sesión
session_start();

try {
    $pdo = new PDO('mysql:host=localhost;dbname=tema4_logueo;charset=utf8mb4', 'dwes', 'abc123.');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

// Procesamiento del formulario al hacer clic en "Aceptar"
if (isset($_POST['aceptar'])) {
    // Validación de campos
    $nombre = substr(htmlspecialchars($_POST['nombre']), 0, 40);
    $apellidos = substr(htmlspecialchars($_POST['apellidos']), 0, 40);
    $direccion = substr(htmlspecialchars($_POST['direccion']), 0, 40);
    $localidad = substr(htmlspecialchars($_POST['localidad']), 0, 40);
    $usuario = substr(htmlspecialchars($_POST['usuario']), 0, 40);
    $password = substr(htmlspecialchars($_POST['password']), 0, 40);
    $repite_password = substr(htmlspecialchars($_POST['repite_password']), 0, 40);

    // Verificación de que las contraseñas coinciden
    if ($password !== $repite_password) {
        echo "<p align='center'>Las contraseñas no coinciden.</p>";
    } else {
        // Hash de la contraseña
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Obtener valores adicionales
        $color_letra = $_POST['color_letra'];
        $color_fondo = $_POST['color_fondo'];
        $tipo_letra = $_POST['tipo_letra'];
        $tam_letra = $_POST['tam_letra'];

        // Insertar datos en la base de datos
        $stmt = $pdo->prepare("INSERT INTO perfil_usuario (nombre, apellidos, direccion, localidad, user, pass, color_letra, color_fondo, tipo_letra, tam_letra) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        try {
            $stmt->execute([$nombre, $apellidos, $direccion, $localidad, $usuario, $hashed_password, $color_letra, $color_fondo, $tipo_letra, $tam_letra]);

            // Después de procesar, redirigir a la página de inicio
            header("Location: inicio.php");
            exit();
        } catch (PDOException $e) {
            // Manejar errores de inserción
            echo "Error al registrar usuario: " . $e->getMessage();
        }
    }
} elseif (isset($_POST['cancelar'])) {
    // Si se presiona "Cancelar", volver a la página principal
    header("Location: index.php");
    exit();
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>REGISTRO</title>
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
        <h1 align="center">Formulario de Registro</h1>
        <form method="post" action="registro.php" align="center">
            <!-- Campos de registro -->
            Nombre: <input type="text" name="nombre" required><br><br>
            Apellidos: <input type="text" name="apellidos" required><br><br>
            Dirección: <input type="text" name="direccion" required><br><br>
            Localidad: <input type="text" name="localidad" required><br><br>
            Usuario: <input type="text" name="usuario" required><br><br>
            Contraseña: <input type="password" name="password" required><br><br>
            Repetir Contraseña: <input type="password" name="repite_password" required><br><br>

            <!-- Campos desplegables -->
            Color de letra:
            <select name="color_letra">
                <option value="red">Rojo</option>
                <option value="blue">Azul</option>
                <option value="green">Verde</option>
                <!-- Agrega más opciones según tus necesidades -->
            </select><br><br>

            Color de fondo:
            <select name="color_fondo">
                <option value="white">Blanco</option>
                <option value="gray">Gris</option>
                <option value="black">Negro</option>
                <!-- Agrega más opciones según tus necesidades -->
            </select><br><br>

            Tipo de letra:
            <select name="tipo_letra">
                <option value="Arial">Arial</option>
                <option value="Times New Roman">Times New Roman</option>
                <option value="Verdana">Verdana</option>
                <!-- Agrega más opciones según tus necesidades -->
            </select><br><br>

            Tamaño de letra: <input type="text" name="tam_letra" required><br><br>

            <!-- Botones -->
            <input type="submit" name="aceptar" value="Aceptar"><br><br>

        </form>
        <form action="inicio.php" method="post" align="center">
            <input type="submit" name="cancelar" value="Cancelar"><br>
        </form>
    </body>
</html>

