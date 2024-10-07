<?php
    function contarLetrasTotales($string) {
        $length = strlen($string);
        $nLetras = $length;
        for ($i = 0; $i < $length; $i++) {
            if ($string[$i] == ' ') {
                $nLetras--;
            }
        }
        echo "El cadena tiene $nLetras letras<br>";
    }
    function contarPalabras($string) {
        $array = explode(' ', $string);
        echo "La cadena tiene " . count($array) . " palabras<br>";
    }
    function contarLetrasPalabras($string) {
        $array = explode(' ', $string);
        for ($i = 0; $i < count($array); $i++) {
            echo "$array[$i], " . strlen($array[$i]) . "<br>";
        }
    }
    $string = "A quien madruga dios le ayuda";
    echo "Llamamos a contarLetrasTotales()...<br><br>";
    contarLetrasTotales($string);
    echo "<br>Llamamos a contarPalabras()...<br><br>";
    contarPalabras($string);
    echo "<br>Llamamos a contarLetrasPalabras()...<br><br>";
    contarLetrasPalabras($string);
?>