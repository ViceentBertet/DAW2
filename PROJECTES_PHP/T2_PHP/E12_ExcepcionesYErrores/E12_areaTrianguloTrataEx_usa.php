<?php
include ("E12_areaTrianguloTrataEx.php");
$t = new E12_areaTrianguloTrataEx();
try {
    $t->areaTriangulo(-11,10);
} catch (Exception $e) {
    echo "Excepcion capturada: <br>Debes insertar un número positivo";
}

?>
