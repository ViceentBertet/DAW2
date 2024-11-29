<?php
    function media($a, $b){
        $nArgs = 2;
        $lista = [$a, $b];
        $suma = 0;
        
        echo "<br><b>Función Media Aritmética de Dos valores</b><br>";
        echo "Numero de argumentos utilizados: " . $nArgs . "<br>";
        echo "<br>Valor de los argumentos utilizados<br>========================<br>";
        
        for ($i = 0; $i < $nArgs; $i++){
            $n = $i + 1;
            echo "argumento " . $n . ": " . $lista[$i] . "<br>";
            $suma += $lista[$i];
        }
        return $suma / $nArgs;
    }
    echo "<b>Programa Principal</b><br>";
    echo "El valor de los parámetros lo esblecemos desde él.<br>";
    $a = 10;
    $b = 20;
    echo "Hacemos la llamada a la función<br>";
    $media = media($a, $b);
    echo "ahora estoy en el Ppal<br>";
    echo "<h2>La media de dichos argumentos es: $media</h2>"
?>

