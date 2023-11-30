<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registro de Usuario</title>
    </head>
    <body>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = $_POST['nombre'];
            $apellidos = $_POST['apellidos'];
            $usuario = $_POST['usuario'];
            $password = $_POST['password'];

            // Hash de la contraseña
            $hash_password = password_hash($password, PASSWORD_DEFAULT);

            try {
                $pdo = new PDO('mysql:host=localhost;dbname=cookies;charset=utf8mb4', 'dwes', 'abc123.');
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Error de conexión a la base de datos: " . $e->getMessage());
            }

            try {
                // Usar una consulta preparada con marcadores de posición
                $stmt = $pdo->prepare("INSERT INTO users (Nombre, Apellidos, usuario, password) VALUES (?, ?, ?, ?)");
                $stmt->execute([$nombre, $apellidos, $usuario, $hash_password]);

                echo "Usuario añadido correctamente";
            } catch (PDOException $e) {
                echo "Error al registrar usuario: " . $e->getMessage();
            }
            // Redirigir a la página recordar
            header("Location: recordarPass.php");
            exit();
        }
        ?>
        <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>" align="center">
            Nombre:
            <input type="text" name="nombre" required>

            <br><br>

            Apellidos:
            <input type="text" name="apellidos" required>

            <br><br>

            Usuario:
            <input type="text" name="usuario" required>

            <br><br>

            Contraseña:
            <input type="text" name="password" required>

            <br><br>

            <input type="submit" name="registro" value="Registrar">
        </form>
    </bodyzz
</html>