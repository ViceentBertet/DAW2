<?php
    $vector1[0][0] = 10;
    $vector1[0][1] = 20;
    $vector1[0][2] = 30;
    $vector1[1][0] = 40;
    $vector1[1][1] = 50;
    $vector1[1][2] = 60;
    $vector1[2][0] = 70;
    $vector1[2][1] = 80;
    $vector1[2][2] = 90;
    $vector2 = array(
      array("A", "B", "C"),
        array("D", "E", "F")
    );
    echo "Visualizamos con FOR anidado<br>";
    for ($i = 0; $i < count($vector1); $i++) {
        for($j = 0; $j < count($vector1[$i]); $j++) {
            echo $vector1[$i][$j] . " ";
        }
        echo "<br>";
    }
    echo "Visualizamos con while<br>";
    $cont1 = 0;
    while ($cont1 < 2){
        $cont2 = 0;
        while ($cont2 < 3) {
            echo $vector2[$cont1][$cont2] . " ";
            $cont2++;
        }
        echo "<br>";
        $cont1++;
    }
?>

