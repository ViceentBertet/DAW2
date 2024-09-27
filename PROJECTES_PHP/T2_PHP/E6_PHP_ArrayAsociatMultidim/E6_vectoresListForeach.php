<?php
    include ("E6_datPersonales.php");
    echo "<b>Vectores Asociativos-Foreach()</b>"
    . "<br><br> Visualizamos el vector creado:<ul>";
    foreach ($vector1 as $nom => $ape) {
        echo '<li>' . $nom . " => " . $ape . "</li>";
    }
    echo '</ul>';
?>
