<?php
    include ("E9_libreriaMediaAritmetica.php");
    $lista = array(10,20,30,40,50,60,70);
    $a = 10;
    $b = 40;
    echo "Realizando llamada a mediaValores...<br><br>";
    mediaValores(10,20,30,40);
    echo "Realizando llamada a mediaArray...<br><br>";
    mediaArray($lista);
    echo "Realizando llamada a mediaValoresRefer...<br><br>";
    mediaValoresRefer($a, $b);
    echo "<br>La media es: $b";
?>

