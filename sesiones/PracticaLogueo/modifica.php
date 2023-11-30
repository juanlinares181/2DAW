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

$usuario = $_SESSION['usuario'];
$stmt = $pdo->prepare("SELECT * FROM perfil_usuario WHERE user = ?");
$stmt->execute([$usuario]);
$userData = $stmt->fetch(PDO::FETCH_ASSOC);

if (isset($_POST['modificar'])) {
    try {
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $direccion = $_POST['direccion'];
        $localidad = $_POST['localidad'];
        $pass = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash de la nueva contraseña
        $color_letra = $_POST['color_letra'];
        $color_fondo = $_POST['color_fondo'];
        $tipo_letra = $_POST['tipo_letra'];
        $tam_letra = $_POST['tam_letra'];
        // Prepara la consulta
        $stmt = $pdo->prepare("UPDATE perfil_usuario SET 
    nombre = :nombre, 
    apellidos = :apellidos, 
    direccion = :direccion, 
    localidad = :localidad, 
    pass = :pass, 
    color_letra = :color_letra, 
    color_fondo = :color_fondo, 
    tipo_letra = :tipo_letra, 
    tam_letra = :tam_letra WHERE user = :usuario");

        // Bindea los parámetros
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':apellidos', $apellidos, PDO::PARAM_STR);
        $stmt->bindParam(':direccion', $direccion, PDO::PARAM_STR);
        $stmt->bindParam(':localidad', $localidad, PDO::PARAM_STR);
        $stmt->bindParam(':pass', $pass, PDO::PARAM_STR);
        $stmt->bindParam(':color_letra', $color_letra, PDO::PARAM_STR);
        $stmt->bindParam(':color_fondo', $color_fondo, PDO::PARAM_STR);
        $stmt->bindParam(':tipo_letra', $tipo_letra, PDO::PARAM_STR);
        $stmt->bindParam(':tam_letra', $tam_letra, PDO::PARAM_STR);
        $stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);

        // Ejecuta la consulta
        $stmt->execute();

        echo "Los datos se han actualizado correctamente.";
    } catch (PDOExcception $e) {
        echo "No se ha modificado correctamente" . $e->getMessage;
    }
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>MODIFICA</title>
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
        <h1 align="center">MODIFICAR TUS DATOS</h1>
        <form method="post" action="" align="center">
            <label class="etiqueta">Nombre:</label>
            <input type="text" name="nombre" value="<?php echo isset($userData['nombre']) ? $userData['nombre'] : ''; ?>">
            <br><br>
            <label class="etiqueta">Apellidos:</label>
            <input type="text" name="apellidos" value="<?php echo isset($userData['apellidos']) ? $userData['apellidos'] : ''; ?>">
            <br><br>
            <label class="etiqueta">Direccion:</label>
            <input type="text" name="direccion" value="<?php echo isset($userData['direccion']) ? $userData['direccion'] : ''; ?>">
            <br><br>
            <label class="etiqueta">Localidad:</label>
            <input type="text" name="localidad" value="<?php echo isset($userData['localidad']) ? $userData['localidad'] : ''; ?>">
            <br><br>
            <label class="etiqueta">Password:</label>
            <input type="text" name="password" value="<?php echo isset($userData['password']) ? $userData['password'] : ''; ?>">
            <br><br>
            <label class="etiqueta">Color de letra:</label>
            <input type="text" name="color_letra" value="<?php echo isset($userData['color_letra']) ? $userData['color_letra'] : ''; ?>">
            <br><br>
            <label class="etiqueta">Color de fondo:</label>
            <input type="text" name="color_fondo" value="<?php echo isset($userData['color_fondo']) ? $userData['color_fondo'] : ''; ?>">
            <br><br>
            <label class="etiqueta">Tipo de letra:</label>
            <input type="text" name="tipo_letra" value="<?php echo isset($userData['tipo_letra']) ? $userData['tipo_letra'] : ''; ?>">
            <br><br>
            <label class="etiqueta">Tamaño de letra:</label>
            <input type="text" name="tam_letra" value="<?php echo isset($userData['tam_letra']) ? $userData['tam_letra'] : ''; ?>">
            <br><br>
        </form>
        <form method="post" action="inicio.php" align="center">
            <input type="submit" name="modificar" value="Modificar">
        </form>

        <form method="post" action="inicio.php" align="center">
            <input type="submit" name="volver" value="Volver">
        </form>

        <form method="post" action="inicio.php" align="center">
            <input type="submit" name="cerrar_sesion" value="Cerrar Sesión">
        </form>

    </body>
</html>

