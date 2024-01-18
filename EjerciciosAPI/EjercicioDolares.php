<?php
// Verificar la clave de API
$apiKey = isset($_GET['api_key']) ? $_GET['api_key'] : '';

if ($apiKey !== '034f28af22b17e03ea484d339214655a') {
    echo json_encode(['error' => 'Clave de API no válida']);
    exit;
}

function convertCurrency($amount, $fromCurrency, $toCurrency) {
    $conversionRates = [
        'EUR_to_USD' => 1.1,
        'USD_to_EUR' => 0.9,
        'USD_to_GBP' => 0.75,
        'GBP_to_USD' => 1.33,
        'EUR_to_GBP' => 1.22,
        'GBP_to_EUR' => 1.19
    ];
    $conversionKey = "{$fromCurrency}_to_{$toCurrency}";

    if (array_key_exists($conversionKey, $conversionRates)) {
        return $amount * $conversionRates[$conversionKey];
    }

    return null;
}

// Función para manejar la solicitud de la API
function handleApiRequest() {
    header('Content-Type: application/json');

    $amount = isset($_GET['amount']) ? floatval($_GET['amount']) : 0;
    $fromCurrency = isset($_GET['from_currency']) ? strtoupper($_GET['from_currency']) : '';
    $toCurrency = isset($_GET['to_currency']) ? strtoupper($_GET['to_currency']) : '';

    if (empty($fromCurrency)) {
        echo json_encode(['error' => 'La moneda de origen es requerida']);
    } else {
        $convertedAmount = convertCurrency($amount, $fromCurrency, $toCurrency);

        if ($convertedAmount !== null) {
            echo json_encode(['result' => "Cantidad en {$toCurrency}: {$convertedAmount}"]);
        } else {
            echo json_encode(['error' => 'No se puede realizar la conversión']);
        }
    }
}

// Verificar si se está realizando una solicitud de API
if (isset($_GET['api'])) {
    handleApiRequest();
} else {
    // Formulario HTML (opcional)
    ?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Conversor de Moneda</title>
        </head>
        <body>
            <h1>Conversor de Moneda</h1>
            <form action="" method="GET">
                <label for="api_key">Clave de API:</label>
                <input type="text" name="api_key" required>
                <br>
                <label for="amount">Cantidad:</label>
                <input type="text" name="amount" required>
                <br>
                <label for="from_currency">Moneda de origen:</label>
                <input type="text" name="from_currency" required>
                <br>
                <label for="to_currency">Moneda de destino:</label>
                <input type="text" name="to_currency" required>
                <br>
                <button type="submit">Convertir</button>
            </form>
        </body>
    </html>
    <?php
}
?>
