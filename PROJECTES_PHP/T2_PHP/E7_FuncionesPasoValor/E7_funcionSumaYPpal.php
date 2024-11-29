<?php
    function suma($a, $b) {
        return $a + $b;
    }
    echo "Asignamos valores a las variables:<br>";
    $a = 10;
    $b = 20;
    echo '$a= ' . $a . "<br>";
    echo '$b= ' . $b . "<br>";
    echo "A continuación hacemos la llamada a la función<br>";
    echo "La suma de " . $a . " y " . $b . " es " . suma($a,$b);
?>
