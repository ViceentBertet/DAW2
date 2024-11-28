<?php
    function mostrar_impares($cadena) {
        echo "Cadena recibida:<br>";
        echo $cadena . "<br><b>";
        $vector = strlen($cadena);
        for ($i = 0; $i < $vector; $i++) {
            if ($i % 2 == 0) {
                echo $cadena[$i];
            }
        }
        echo "</b>";
    }
    function muestra_palabras_impares($cadena) {
        echo "Cadena recibida:<br>";
        echo $cadena . "<br><b>";
        $vector = explode(' ', $cadena);
        for ($i = 0; $i < count($vector); $i++) {
            if ($i % 2 == 0) {
                echo $vector[$i] . " ";
            }
        }
        echo "</b>";
    }
    $cadena = "A quien madruga Dios le ayuda";
    echo "mostrar_impares():<br>";
    mostrar_impares($cadena);
    echo "<br><br>muestra_palabras_pares():<br>";
    muestra_palabras_impares($cadena);
?>