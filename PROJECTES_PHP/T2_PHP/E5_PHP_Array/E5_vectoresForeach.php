<?php
    $vector = array("Vicent", "Roberto", "Sergi", "Jordi", "Alvaro");
    echo "Contenido del vector de cadenas con FOREACH ";
    echo "<ul>";
    foreach ($vector as $nom) {
        echo "<li>" . $nom . "</li>";
    }
    echo "</ul>";
?>

