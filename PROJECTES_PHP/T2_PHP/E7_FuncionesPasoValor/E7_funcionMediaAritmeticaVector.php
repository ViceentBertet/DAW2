<?php
    function mediaVector($lista){
        $nArgs = count($lista);
        $suma = 0;
        
        echo "<br><b>Función Media Aritmética con array</b><br>";
        echo "Numero de argumentos utilizados: " . $nArgs . "<br>";
        echo "<br>Valor de los argumentos utilizados<br>========================<br>";
        
        for ($i = 0; $i < $nArgs; $i++){
            $suma += $lista[$i];
        }
        print_r($lista);
        
        $media = $suma / $nArgs;
        echo "<h2>La media de dichos argumentos es: $media</h2>";
    }
    echo "<b>Programa Principal</b><br>";
    echo "El valor de los parámetros lo esblecemos desde él.<br>";
    $vector = [10,20,30];
    echo "Hacemos la llamada a la función<br>";
    mediaVector($vector);
?>
