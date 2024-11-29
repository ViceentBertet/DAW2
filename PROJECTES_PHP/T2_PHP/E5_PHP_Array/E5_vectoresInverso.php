<?php
    $vector = array("Vicent", "Roberto", "Sergi", "Jordi", "Alvaro");
    echo "Contenido del vector de cadenas con WHILE-END-PREV ";
    end($vector);
    echo "<ul>";
    while (current($vector)){
        echo "<li>" . current($vector) ."</li>";
        prev($vector);
    }
    echo "</ul>";
?>
