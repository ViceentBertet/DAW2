<?php
    echo "<b>Tablas de multiplicar Autollamante</b><br><br>";
    if (!empty($_GET['numero'])) {
        $n = $_GET['numero'];
        echo "<table style='border:1px solid black;'>";
        for ($i = 0; $i < 11; $i++){
        $res = $n * $i;
        echo "<tr><td style='border:1px solid black;'>$n x $i</td>"
                . "<td style='border:1px solid black;'>$res</td></tr>";
        }
    echo "</table>";
    } else {
       for ($i = 1; $i < 11; $i++) {
        echo "<a href='E3_multiplicarSelf.php?numero=$i'>Ver la tabla del $i</a><br>";
        } 
    }
?>
