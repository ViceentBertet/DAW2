<?php
class E12_areaTrianguloTrataEx {
    function areaTriangulo($base, $altura){
        if ($base < 0 || $altura < 0) {
            throw new Exception();
        }
        $area = $base * $altura / 2;
        echo "ÁREA del TRIÁNGULO de base $base y altura $altura = $area";
    }
}
?>