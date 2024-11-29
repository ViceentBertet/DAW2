<?php
    include ("E11_cocheHer.php");
    $coche1 = new CocheHer("Audi", "Q5", "140", "37000");
    $coche2 = new CocheHer("Audi","Q7","240","58000");
    $coche1->color = "Rojo";
    $coche1->extras = array("Asientos de cuero", "Suspensiones deportivas", "Electrónica superior");
    $coche2->color = "Azul";
    $coche2->extras = array("Radio de altas calidades", "Motor potenciado", "Frenos de carreras");
    echo "Datos coche 1: <br>===============<br>";
    echo "Marca:" . $coche1->getMarca() . "<br>Modelo:" . $coche1->getModelo() . "<br>Potencia:" . $coche1->getPotencia() . "<br>Pvp:" . $coche1->getPvp() . "<br>";
    $coche1->mostrarColor();
    echo "Extras:";
    $coche1->mostrarExtras();
    echo "<br>Datos coche 2: <br>===============<br>";
    echo "Marca:" . $coche2->getMarca() . "<br>Modelo:" . $coche2->getModelo() . "<br>Potencia:" . $coche2->getPotencia() . "<br>Pvp:" . $coche2->getPvp() . "<br>";
    $coche2->mostrarColor();
    echo "Extras:";
    $coche2->mostrarExtras();

?>