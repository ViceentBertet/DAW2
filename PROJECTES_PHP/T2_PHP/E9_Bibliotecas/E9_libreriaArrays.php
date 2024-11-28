<?php
function vectoresUnordList($vector, $vector2) {
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
}
function vectoresUnordListRange($vector) {
    echo "Usar función range:";
    echo "<ul>";
    for ($i = 0; $i < count($vector);$i++){
      echo "<li>Elemento " . $i . " vale: " . $vector[$i] . "</li>";
    }
    echo "</ul>";
}
function vectoresWhile($vector){
    
    echo "Contenido del vector de cadenas con WHILE-RESET-NEXT";
    reset($vector); // Aunque funciona sin poner reset es importante por la coherencia del codigo
    echo "<ul>";
    while (current($vector)){
        echo "<li>" . current($vector) ."</li>";
        next($vector);
    }
    echo "</ul>";
}
function vectoresInverso($vector) {
    echo "Contenido del vector de cadenas con WHILE-END-PREV ";
    end($vector);
    echo "<ul>";
    while (current($vector)){
        echo "<li>" . current($vector) ."</li>";
        prev($vector);
    }
    echo "</ul>";
}
function vectoresForeach($vector) {
    echo "Contenido del vector de cadenas con FOREACH ";
    echo "<ul>";
    foreach ($vector as $nom) {
        echo "<li>" . $nom . "</li>";
    }
    echo "</ul>";
}
?>