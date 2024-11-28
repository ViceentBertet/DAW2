<?php
    $n = $_GET['numero'];
    echo "VER LA TABLA DEL $n<br><table style='border:1px solid black;'>";
    for ($i = 0; $i < 11; $i++){
        $res = $n * $i;
        echo "<tr><td style='border:1px solid black;'>$n x $i</td>"
                . "<td style='border:1px solid black;'>$res</td></tr>";
    }
    echo "</table>";
?>

