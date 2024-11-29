<?php
    $horas = 1;
    echo "Fracciones de la $horas<br>";
    for ($i = 0;$horas <= 24; $i += 5) {
        if ($i == 60){
            $i = 0;
            $horas++;
            if ($horas != 25) echo "Fracciones de las $horas<br>";
        }
        if ($horas != 25)printf("%02d:%02d <br>", $horas, $i);
    }
?>