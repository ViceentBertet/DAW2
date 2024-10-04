<?php
    function mostrarHora() {
        $hora = getdate();
        echo "--------------------------------------------------<br>";
        echo "<b>Ahora son las: $hora[hours] horas y $hora[minutes] minutos</b>";
        echo "<br>--------------------------------------------------<br>";
    }
    mostrarHora();
?>