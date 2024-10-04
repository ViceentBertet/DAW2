<?php
    function mostrarHora() {
        $hora = getdate();
        echo "--------------------------------------------------<br>";
        echo "<b>Ahora son las: $hora[hours] horas y $hora[minutes] minutos</b>";
        echo "<br>--------------------------------------------------<br>";
    }
    function saludo() {
        $hora = getdate();
        if ($hora['hours'] >= 0 & $hora['hours'] <= 11) {
            echo "Buenos días usuario";
        } else if ($hora['hours'] >= 12 & $hora['hours'] <= 20) {
            echo "Buenas tardes usuario";
        } else {
            echo "Buenas noches usuario";
        }
    }
    mostrarHora();
    saludo();
?>
