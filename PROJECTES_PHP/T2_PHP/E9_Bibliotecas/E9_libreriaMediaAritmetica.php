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
    function mediaArray($lista){
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
    function mediaValoresRefer($num1, &$num2) {
        echo "<b>Función Media Aritmética</b><br>";
        echo "Número de argumentos utilizados: 2<br><br>";
        echo "Valor de los argumentos utilizados: <br>$num1 y $num2";
        $num2 = ($num1 + $num2) / 2;
        echo "<br>No hace falta hacer return<br>";
    }
?>

