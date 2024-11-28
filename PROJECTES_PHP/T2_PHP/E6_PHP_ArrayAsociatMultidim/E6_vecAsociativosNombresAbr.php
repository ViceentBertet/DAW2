<?php
    include ("E6_datPersonales.php");
    echo "<b>Vector asociativo con FOREACH";
    foreach ($vector1 as $nom => $ape) {
        echo '<br>' . $nom . " >>>>> " . $ape;
    }
    echo '</b>'
?>