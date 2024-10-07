<?php
    include ("E11_cocheGetSet.php");
    $coche1 = new Coche();
    $coche1->setMarca("Audi");
    $coche1->setModelo("Q5");
    $coche1->setPotencia("140");
    $coche1->setPvp("37000");
    $coche2 = new Coche();
    $coche2->setMarca("Audi");
    $coche2->setModelo("Q7");
    $coche2->setPotencia("240");
    $coche2->setPvp("58000");
    echo "Datos coche 1: <br>===============<br>";
    echo "Marca:" . $coche1->getMarca() . "<br>Modelo:" . $coche1->getModelo() . "<br>Potencia:" . $coche1->getPotencia() . "<br>Pvp:" . $coche1->getPvp() . "<br>";
    echo "<br>Datos coche 2: <br>===============<br>";
    echo "Marca:" . $coche2->getMarca() . "<br>Modelo:" . $coche2->getModelo() . "<br>Potencia:" . $coche2->getPotencia() . "<br>Pvp:" . $coche2->getPvp() . "<br>";

?>