<?php
    include ("E9_libreriaArraySuma.php");
    $vector = range(100, 200, 25);
    echo "Invocando a arraySuma<br><br>";
    arraySuma($vector);
    echo "<br><br>Invocando a arraySumaTabla<br><br>";
    arraySumaTabla($vector);
?>

