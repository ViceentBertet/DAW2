<?php
    include ("E6_datPersonales.php");
    echo "<b>Vector asociativo con FOREACH";
    foreach ($vector2 as $nom => $ape) {
        echo '<br>' . $nom . " >>>>> " . $ape;
    }
    echo '</b>'
?>
