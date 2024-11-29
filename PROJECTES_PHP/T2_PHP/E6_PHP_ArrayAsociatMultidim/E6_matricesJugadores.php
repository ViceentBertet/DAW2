<?php
    $jugadores = array(
        array("Coutinho", "Salah", "Luis Suarez"),
        array("Messi", "Busquets", "Lewandowski"),
        array("Mbappe", "Ronaldo", "Modric")
    );
    for ($i = 0; $i < count($jugadores); $i++) {
        for($j = 0; $j < count($jugadores[$i]); $j++) {
            echo "Fila $i - Col $j<br>";
            echo $jugadores[$i][$j] . "<br><br>";
        }
    }
?>
