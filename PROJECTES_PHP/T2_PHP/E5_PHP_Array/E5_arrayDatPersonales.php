<?php
    include ("E5_datPersonales.php");
    $vector = array($nombre1, $ape1, $edad1, $num1, $nombre2, $ape2, $edad2, $num2);
    echo "<b>Array Datos Alumno</b>";
    echo "<h3>Los Datos del array son:</h3>";
    foreach($vector as $dato){
        echo $dato . "<br>";
    }
?>


