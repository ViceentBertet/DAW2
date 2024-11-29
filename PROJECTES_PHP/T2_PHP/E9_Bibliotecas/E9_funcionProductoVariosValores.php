<?php
function productoVariosValores(){
        $nArgs = func_num_args();
        $lista = func_get_args();
        $prod = 1;
        
        echo "<br><b>Función Producto</b><br>";
        echo "Numero de elementos a multiplicar: " . $nArgs . "<br>";
        echo "<br>Valores<br>========================<br>";
        
        for ($i = 0; $i < $nArgs; $i++){
            $n = $i + 1;
            echo "Parámetro " . $n . " ===> valor: " . $lista[$i] . "<br>";
            $prod *= $lista[$i];
        }
        echo "<h2>El producto es: $prod</h2>";
    }
?>