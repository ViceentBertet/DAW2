<?php
    $vector = array(
        array(
            172,165,179,163,170,174
        ),
        array(
            "H","M","H","M","M","H"
        )       
    );
    $alturaH = 0;
    $alturaM = 0;
    $nH = 0;
    $nM = 0;
     
    for($j = 0; $j < count($vector[0]); $j++) {
        if ($vector[1][$j] == "H") {
            $alturaH += $vector[0][$j];
            $nH++;
        } else {
            $alturaM += $vector[0][$j];
            $nM++;
        }
    }
    $mediaH = $alturaH / $nH;
    $mediaM = $alturaM / $nM;
    echo "Número de Hombres de la muestra: <br> $nH";
    echo "<br>Número de Mujeres de la muestra: <br> $nM";
    echo "<br>La media de altura de los hombres en cm es: <br> $mediaH";
    echo "<br>La media de altura de las mujeres en cm es: <br> $mediaM";
         
?>
