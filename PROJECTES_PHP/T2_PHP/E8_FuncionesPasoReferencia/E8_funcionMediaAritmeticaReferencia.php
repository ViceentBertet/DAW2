<?php
    function mediaValoresRefer($num1, &$num2) {
        echo "<b>Función Media Aritmética</b><br>";
        echo "Número de argumentos utilizados: 2<br><br>";
        echo "Valor de los argumentos utilizados: <br>$num1 y $num2";
        $num2 = ($num1 + $num2) / 2;
        echo "<br>No hace falta hacer return<br>";
    }
    echo "<b>Programa Principal</b><br>";
    echo "El valor de los parámetros lo establecemos desde él<br>";
    $num1 = 10;
    $num2 = 30;
    echo "Hacemos la llamada a la función<br><br>";
    mediaValoresRefer($num1, $num2);
    echo "El resultado está en num2 y es: $num2"
?>

