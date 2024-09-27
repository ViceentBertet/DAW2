<?php
    include ("E6_datPersonales.php");
    
    echo "<b>Vectores Asociativos</b><br>";
    echo "Recorre vector con while-list(clave-valor):";
    
    //Como each() esta deprecated lo he hecho de la siguiente manera
    $claves = array_keys($vector1);
    for($i = 0; $i < count($claves); $i++) {
       $clave = $claves[$i];
       echo "<br>" . $i + 1 . '- ' . $clave . " " . $vector1[$clave];
   }
?>
