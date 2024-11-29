<?php
    $vector = array(1,2,3,4,5,6,7,8,9,10);
    $vector2[0] = 10;
    $vector2[1] = 20;
    $vector2[2] = 30;
    $vector2[3] = 40;
    $vector2[4] = 50;
    $vector2[5] = 60;
    $vector2[6] = 70;
    $vector2[7] = 80;
    $vector2[8] = 90;
    $vector2[9] = 100;
    echo "Vector de forma abreviada:";
    echo "<ul>";
    for ($i = 0; $i < count($vector);$i++){
      echo "<li>Elemento " . $i . " vale: " . $vector[$i] . "</li>";
    }
    echo "</ul>";
    echo "<br>Vector de forma desarrollada:";
    echo "<ul>";
    for ($i = 0; $i < count($vector2);$i++){
      echo "<li>Elemento " . $i . " vale: " . $vector2[$i] . "</li>";
    }
    echo "</ul>";
?>
