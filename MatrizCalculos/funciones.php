<?php

function crearMatriz($filas, $columnas) {
    for ($i = 0; $i < $filas; $i++) {
        for ($j = 0; $j < $columnas; $j++) {
           $matriz[$i][$j] = random_int(1, 100);
        }
    }
    return $matriz;
}

function muestraMatriz($matriz) {
    echo '<table border="1">';
    foreach ($matriz as $value) {
        echo '<tr>';
        foreach ($valor as $array) {
            echo '<td>'.$array.'</td>';
        }
        echo '</tr>';
    }
    echo '</table';
}

function sumFilas($matriz) {
    foreach ($matriz as $fila) {
        $sum = 0;
        foreach ($fila as $valor) {
            $sum = $sum + $valor;
        }
        // array_push($sumafilas, $sum);
        $sumafilas[] = $sum;
    }
    return $sumafilas;
}

function sumColumnas($matriz) {
    $numFilas = count($matriz);
    $numColumnas = count($matriz[0]);
    $sumaColumnas = array();

    for ($j = 0; $j < $numColumnas; $j++) {
        $suma = 0;
        for ($i = 0; $i < $numFilas; $i++) {
            $suma += $matriz[$i][$j];
        }
        $sumaColumnas[] = $suma;
    }

    return $sumaColumnas;
}

function sumFilasYColumnas($matriz) {
    $sumaFilas = sumaFilas($matriz);
    $sumaColumnas = sumaColumnas($matriz);

    $resultados = array(
        'filas' => $sumaFilas,
        'columnas' => $sumaColumnas
    );

    return $resultados;
}

function sumDiagonal($matriz) {
    $sum = 0;
    for ($i = 0; $i < count($matriz); $i++) {
        for ($j = 0; $j < count($matriz[0]); $j++) {
            if ($i == $j) {
            $suma += $matriz[$i][$j];
            }
        }
    }
    return $sum;
}

function matrizTraspuesta($matriz) {
    $numFilas = count($matriz);
    $numColumnas = count($matriz[0]);
    $matrizTraspuesta = array();

    for ($i = 0; $i < $numColumnas; $i++) {
        $filaTraspuesta = array();
        for ($j = 0; $j < $numFilas; $j++) {
            $filaTraspuesta[] = $matriz[$j][$i];
        }
        $matrizTraspuesta[] = $filaTraspuesta;
    }

    return $matrizTraspuesta;
}