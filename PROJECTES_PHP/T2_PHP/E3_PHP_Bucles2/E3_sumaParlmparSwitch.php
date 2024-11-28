<?php
    echo "En el rango 0 .. 100:";
    $sumaPares = 0;
    $sumaImpares = 0;
    for($i = 1; $i <= 100; $i++) {
        switch ($i % 2) {
            case 0:
                $sumaPares += $i;
                break;
            case 1:
                $sumaImpares += $i;
        }
    }
    echo "<br>La suma de los <b>PARES</b> es: $sumaPares";
    echo "<br>La suma de los <b>IMPARES</b> es: $sumaImpares";
?>
