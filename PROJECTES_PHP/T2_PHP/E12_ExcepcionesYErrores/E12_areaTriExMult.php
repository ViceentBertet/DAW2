<?php
class E12_areaTriExMult {
    function areaTriangulo($base, $altura){
        if ($base < 0) {
            throw new Exception("La base es negativa");
        }
        if ($altura < 0) {
            throw new Exception("La altura es negativa");
        }
        if ($base > 2000 || $altura > 5000){
            throw new Exception("La base o altura superan el limite establecido (2000 y 5000)");            
        }
           
        $area = $base * $altura / 2;
        echo "ÁREA del TRIÁNGULO de base $base y altura $altura = $area";
    }
}
?>
