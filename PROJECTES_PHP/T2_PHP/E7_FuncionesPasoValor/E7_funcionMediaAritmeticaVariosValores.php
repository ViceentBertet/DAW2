<?php
    function mediaValores(){
        $nArgs = func_num_args();
        $lista = func_get_args();
        $suma = 0;
        
        echo "<br><b>Función Media Aritmética</b><br>";
        echo "Numero de argumentos utilizados: " . $nArgs . "<br>";
        echo "<br>Valor de los argumentos utilizados<br>========================<br>";
        
        for ($i = 0; $i < $nArgs; $i++){
            $n = $i + 1;
            echo "Parámetro " . $n . " ===> valor: " . $lista[$i] . "<br>";
            $suma += $lista[$i];
        }
        $media = $suma / $nArgs;
        echo "<h2>La media de dichos argumentos es: $media</h2>";
    }
    echo "<b>Programa Principal</b><br>";
    echo "El valor de los parámetros lo esblecemos desde él.<br>";
    $a = 10;
    $b = 20;
    $c = 30;
    $d = 40;
    echo "Hacemos la llamada a la función<br>";
    mediaValores($a, $b, $c, $d);
    echo "Ahora estoy de vuelta en Programa ppal<br>";
    
?>

