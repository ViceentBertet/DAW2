<?php
    $random;
    $cont = 0;
    for ($i = 0; $i < 5;$i++) {
        $random = rand(0,10);
        echo $random . "<br>";
        if ($random > 4) {
            $cont++;
        }
    }
    echo "<b>El número de alumnos aprobados es : $cont</b>"

?>
