<?php
function calcMedia ($a, $b, $c, $d, &$suma, &$media) {
    echo "<b>Estamos en la función<br>====================</b><br>";
    echo "Valor de los argumentos utilizados:"
    . "<ul><li>Parámetro 1 ==> $a</li>"
    . "<li>Parámetro 2 ==> $b</li>"
    . "<li>Parámetro 3 ==> $c</li>"
    . "<li>Parámetro 4 ==> $d</li></ul>";
    
    $suma = $a + $b + $c + $d;
    $media = $suma / 4;
   
    echo "Valor del prámetro SUMA = $suma<br>";
    echo "Valor del parámetro MEDIA = $media<br><br>";
}
echo "<b>Programa Principal<br>====================</b><br>";
echo "El valor de los parámetros lo establecemos desde él.";
$suma = 10202;
$media = 102023;
echo "Invocamos a la función<br>====================<br><br>";
calcMedia(10, 20, 30, 40, $suma, $media);

echo "<b>Estamos de nuevo en el Programa Principal<br>====================</b><br>";
echo "La SUMA está en suma y es $suma<br>";
echo "La MEDIA está en media y es $media";
?>