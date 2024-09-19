<?php
    $final = "AM";
    for ($vueltas = 0; $vueltas < 2; $vueltas++){
        if ($vueltas == 1)$final = "PM";
        
        for ($i = 0;$i < 12; $i++) {
            echo "<br><b>HORAS $final:</b><br>";
            for ($j = 0; $j < 60; $j += 15) {
                if ($i == 0)printf("%02d:%02d $final<br>", 12, $j);
                else printf("%02d:%02d $final <br>", $i, $j);
            }
        }
    }
    
?>