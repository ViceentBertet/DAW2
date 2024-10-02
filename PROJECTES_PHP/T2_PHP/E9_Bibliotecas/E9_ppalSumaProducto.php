<?php
    include ("E9_funcionSumaProducto.php");
    echo "Asignamos valores a los dos valores<br>";
    $a = 10;
    $b = 20;
    echo '$a =' . $a . "<br>". '$b =' . $b;
    echo "<br><br>Llamada a Funcion Suma";
    $suma = suma(10,20);
    echo "<br>La suma de $a y $b es $suma";
    echo "<br><br>Llamada a Funcion Producto";
    $prod = producto(10,20);
    echo "<br>El producto de $a y $b es $prod"
?>