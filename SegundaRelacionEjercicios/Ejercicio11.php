<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 11</title>
    </head>
    <body>
        <?php
        $array1 = [];
        $array2 = [];
        for ($i = 0; $i < 4; $i++) {
            $array1[] = rand(1, 100);
            $array2[] = rand(1, 100);
        }

        echo "Arrays originales: ";
        echo "Array 1: " . implode(', ', $array1) . "<br>";
        echo "Array 2: " . implode(', ', $array2) . "<br>";

        $mergedArray1 = array_merge($array1, $array2);

        $mergedArray2 = $array1;
        foreach ($array2 as $valor) {
            $mergedArray2[] = $valor;
        }

        echo "Arrays unidos: ";
        echo "<p>Usando array_merge: " . implode(', ', $mergedArray1) . "</p>";
        echo "<p>De manera manual: " . implode(', ', $mergedArray2) . "</p>";

        sort($mergedArray1);

        $mergedArray2 = $mergedArray1;
        for ($j = 0; $j < count($mergedArray2); $j++) {
            if ($mergedArray2[$i] > $mergedArray2[$j]) {
                $temp = $mergedArray2[$i];
                $mergedArray2[$i] = $mergedArray2[$j];
                $mergedArray2[$j] = $temp;
            }
        }


        echo "Arrays ordenados:";
        echo "<p>Usando sort: " . implode(', ', $mergedArray1) . "</p>";
        echo "<p>Sin sort: " . implode(', ', $mergedArray2) . "</p>";
        ?>
    </body>
</html>


