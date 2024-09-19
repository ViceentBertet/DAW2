<?php
    define("RADIO_TIERRA", 6371);
    define("DISTANCIA_SOL", 149600000);
    define("PI", 3.14);
    define("VUELTA", PI * 2 * RADIO_TIERRA);
    define("LONGITUD", DISTANCIA_SOL / VUELTA);
    echo "El radio de la Tierra es: " . '<b>' . RADIO_TIERRA . " km" . '</b>';
    echo '<br>';
    echo "La distancia de la Tierra al Sol es: " . '<b>' . DISTANCIA_SOL . " km" . '</b>';
    echo '<br>';
    echo "La longitud de una vuelta al Ecuador es: " . '<b>' . VUELTA . " km" . '</b>';
    echo '<br>';
    echo "La longitud equivale a " . '<b>' . LONGITUD . " km" . '</b>';
?>

