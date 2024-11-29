<?php
    include ("E11_coche.php");
    $coche1 = new Coche();
    $coche1->marca = "Audi";
    $coche1->modelo = "Q5";
    $coche1->potencia = "140";
    $coche1->pvp = "37000";
    $coche2 = new Coche();
    $coche2->marca = "Audi";
    $coche2->modelo = "Q7";
    $coche2->potencia = "240";
    $coche2->pvp = "58000";
    echo "Datos coche 1: <br>===============<br>";
    echo "Marca:$coche1->marca<br>Modelo:$coche1->modelo<br>Potencia:$coche1->potencia<br>Pvp:$coche1->pvp<br>";
    echo "<br>Datos coche 2: <br>===============<br>";
    echo "Marca:$coche1->marca<br>Modelo:$coche1->modelo<br>Potencia:$coche1->potencia<br>Pvp:$coche1->pvp<br>";

?>
