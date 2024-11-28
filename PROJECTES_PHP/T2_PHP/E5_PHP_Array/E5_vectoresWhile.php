<?php
    $vector = array("Vicent", "Roberto", "Sergi", "Jordi", "Alvaro");
    echo "Contenido del vector de cadenas con WHILE-RESET-NEXT";
    reset($vector); // Aunque funciona sin poner reset es importante por la coherencia del codigo
    echo "<ul>";
    while (current($vector)){
        echo "<li>" . current($vector) ."</li>";
        next($vector);
    }
    echo "</ul>";
?>
