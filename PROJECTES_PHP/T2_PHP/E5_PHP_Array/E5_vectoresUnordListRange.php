<?php
    $vector = range(10, 100, 10);
    echo "Usar función range:";
    echo "<ul>";
    for ($i = 0; $i < count($vector);$i++){
      echo "<li>Elemento " . $i . " vale: " . $vector[$i] . "</li>";
    }
    echo "</ul>";
?>
