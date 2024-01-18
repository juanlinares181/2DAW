<?php

// Conexión a la base de datos
$dsn = "mysql:host=localhost;dbname=persona;charset=utf8mb4";
$username = "dwes";
$password = "abc123.";

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error al conectar a la base de datos: " . $e->getMessage());
}


$apiUrl = "https://random-data-api.com/api/v2/users?size=2&response_type=json";
$data = file_get_contents($apiUrl);
$users = json_decode($data, true);


if (isset($users['items']) && is_array($users['items'])) {
    foreach ($users['items'] as $user) {
        $nombre = isset($user['nombre']) ? $user['nombre'] : '';
        $apellidos = isset($user['apellidos']) ? $user['apellidos'] : '';
        $telefono = isset($user['telefono']) ? $user['telefono'] : '';
        $fecha_nacimiento = isset($user['fecha_nacimiento']) ? $user['fecha_nacimiento'] : '';
        $ciudad = isset($user['ciudad']) ? $user['ciudad'] : '';
        $pais = isset($user['pais']) ? $user['pais'] : '';
        $tarjeta_credito = isset($user['tarjeta_credito']) ? $user['tarjeta_credito'] : '';

        // Verificar si 'nombre' no es nulo
        if (!empty($nombre)) {
            // Resto del código de inserción en la base de datos...
        } else {
            echo "Error: 'nombre' no puede ser nulo.<br>";
        }
    }
} else {
    echo "La respuesta de la API no tiene el formato esperado.";
}