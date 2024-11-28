<?php
    include ("E9_libreriaArrays.php");
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
    $vector3 = range(10, 100, 10);
    $vector4 = array("Vicent", "Roberto", "Sergi", "Jordi", "Alvaro");
    vectoresUnordList($vector, $vector2);
    vectoresUnordListRange($vector3);
    vectoresWhile($vector4);
    vectoresInverso($vector4);
    vectoresForeach($vector4);
?>

