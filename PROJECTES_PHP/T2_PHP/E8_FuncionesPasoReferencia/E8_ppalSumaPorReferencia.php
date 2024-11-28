<?php
    function suma($a, $b, &$res) {
       $res = $a + $b;
    }
    echo "Asignamos valores a las variables<br>";
    $a = 10;
    $b = 20;
    $res = 0;
    echo '$a = 10 <br> $b = 20<br>';
    echo "Llamada a Funcion <b>Suma(a,b,resultado)</b><br>";
    suma($a, $b, $res);
    echo "La suma de $a y $b es $res";
?>

