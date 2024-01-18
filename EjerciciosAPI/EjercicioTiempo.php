<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Consulta del Tiempo en Andalucía</title>
    </head>
    <body>
        <h1>Consulta del Tiempo en Andalucía</h1>
        <form method="post" action="">
            <label for="provincia">Selecciona una provincia:</label>
            <select name="provincia">
                <option value="almeria">Almería</option>
                <option value="cadiz">Cádiz</option>
                <option value="cordoba">Córdoba</option>
                <option value="granada">Granada</option>
                <option value="huelva">Huelva</option>
                <option value="jaen">Jaén</option>
                <option value="malaga">Málaga</option>
                <option value="sevilla">Sevilla</option>
            </select>
            <button type="submit" name="consultarTiempo">Consultar Tiempo</button>
        </form>

        <?php
        if (isset($_POST['consultarTiempo'])) {
            $provinciaSeleccionada = $_POST['provincia'];

            $coordenadas = [
                "almeria" => ["lat" => 36.840164, "lon" => -2.467922],
                "granada" => ["lat" => 37.1775, "lon" => -3.5986],
                "huelva" => ["lat" => 37.2614, "lon" => -6.9447],
                "sevilla" => ["lat" => 37.3886, "lon" => -5.9825],
                "cadiz" => ["lat" => 36.5298, "lon" => -6.2923],
                "jaen" => ["lat" => 37.7795, "lon" => -3.7844],
                "malaga" => ["lat" => 36.7213, "lon" => -4.4215],
                "cordoba" => ["lat" => 37.8882, "lon" => -4.7794],
            ];

            if (array_key_exists($provinciaSeleccionada, $coordenadas)) {
                $latitud = $coordenadas[$provinciaSeleccionada]["lat"];
                $longitud = $coordenadas[$provinciaSeleccionada]["lon"];

                if (!empty($latitud) && !empty($longitud)) {
                    $url = "https://api.openweathermap.org/data/2.5/weather?lat=$latitud&lon=$longitud&appid=034f28af22b17e03ea484d339214655a";

                    $datos = file_get_contents($url);

                    if ($datos !== false) {
                        $tiempo = json_decode($datos, true);

                        echo "<div id='resultado'>";
                        echo "<h2>Tiempo en {$tiempo['name']}</h2>";
                        echo "<p>Temperatura: " . (isset($tiempo['main']['temp']) ? $tiempo['main']['temp'] . " K" : "N/A") . "</p>";
                        echo "<p>Descripción: " . (isset($tiempo['weather'][0]['description']) ? $tiempo['weather'][0]['description'] : "N/A") . "</p>";
                        echo "<p>Humedad: " . (isset($tiempo['weather'][0]['humidity']) ? $tiempo['weather'][0]['humidity'] : "N/A") . "</p>";
                        $iconCode = $tiempo['weather'][0]['icon'];
                        $iconUrl = "http://openweathermap.org/img/w/{$iconCode}.png";
                        echo "<img src='{$iconUrl}' alt='weather Icon'</div>";
                    } else {
                        echo "Error al obtener datos del tiempo.";
                    }
                } else {
                    echo "Error: Coordenadas no válidas para la provincia seleccionada.";
                }
            } else {
                echo "Error: Provincia seleccionada no encontrada en las coordenadas.";
            }
        }
        ?>
    </body>
</html>
