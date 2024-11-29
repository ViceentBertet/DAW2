<?php
    $vector = range(10, 50, 10);
    $suma = 0;
    echo "<b>Declarar y Recorrer Vectores</b><br><br>";
    echo "Declara array unidimensional<br><br>";
    echo "Recorre array<br><br>";
    echo "Número de elementos del array: " . count($vector) . "<br><br>";
    echo "Los elementos del array son:<br>";
    foreach ($vector as $num) {
        echo $num . "<br>";
        $suma += $num;
    }
    echo "<br><br><b>SUMA " . $suma . "</b>";
?>
