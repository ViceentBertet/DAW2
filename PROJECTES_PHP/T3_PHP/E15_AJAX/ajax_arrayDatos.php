<?php
    $a[0] = "Ana";
    $a[1] = "Belén";
    $a[2] = "Carmen";
    $a[3] = "Daniel";

    $q = $_GET['q'];

    $res = "";
    if ($q !== "") {
        $q = strtolower($q);
        $tam = strlen($q);
        foreach ($a as $nom) {
            if (stristr($q, substr($nom,0, $tam))) {
                if ($res === "") {
                    $res = "<p>$nom</p>";
                } else {
                    $res .= "<p>$nom</p>";
                }
            }
        }
    }
    if ($res === "") {
        echo "No existen coincidencias";
    } else {
        echo $res;
    }
?>