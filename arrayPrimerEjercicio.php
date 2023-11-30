<table border="1">
    <?php
    print_r($_SERVER);
    echo "<tr><th>Indice</th><th>Valor</th></tr>";
    foreach ($_SERVER as $ind => $valor) {
        echo "<tr><td>" . $ind . "</td><td>" . $valor . "</td></tr>";
    }
    ?>
</table>