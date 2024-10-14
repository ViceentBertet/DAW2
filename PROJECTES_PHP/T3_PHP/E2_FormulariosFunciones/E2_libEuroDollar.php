<?php
define("USD",1.20302);
function conv_USDtoEu($cantUSD) {
    echo "<p><b>Realizamos la conversión a Euros</b></p><p>Usted indicó la siguiente información:</p>";
    return round($cantUSD / USD, 2);       
}
function conv_EutoUSD($cantEur) {
    echo "<p><b>Realizamos la conversión a USD</b></p><p>Usted indicó la siguiente información:</p>";
    return round($cantEur * USD, 2);
   
}
function visualiza($cantInicial, $cant) {
    if ($cantInicial < $cant) {
        echo "Cantidad = $cantInicial Euros<br>";
        echo "Resultado de la conversión = $cant USD";
    } else {
        echo "Cantidad = $cantInicial USD<br>";
        echo "Resultado de la conversión = $cant Euros";
    }
     
}
function error_vacio() {
    echo "<h3>Error: No hay valor</h3>";
}
function error_negativo($cant){
    echo "<b>Oops...<br>Error $cant es negativo</b>";
}
?>
