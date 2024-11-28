<?php
class E12_areaTrianguloArr {
    function areasTriangulos($bases, $alturas){
        for ($i = 0; $i < count($bases); $i++){
            try {
                $this->areaTriangulo($bases[$i], $alturas[$i]);           
            } catch (Exception $e){
                echo $e->getMessage();
            }
        }
    }
    function areaTriangulo($base, $altura){
        if ($base < 0 || $altura < 0) {
            throw new Exception("Ha habido una excepción:Debes insertar un número positivo<br>");
        }
         
        $area = $base * $altura / 2;
        echo "ÁREA del TRIÁNGULO de base $base y altura $altura = $area<br>";
    }
}
?>
