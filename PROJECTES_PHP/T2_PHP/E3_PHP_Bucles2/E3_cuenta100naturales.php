<?php
    $suma = 0;
    for($i = 1; $i <= 100; $i++) {
        if ($i != 100) {
            echo $i . "-";
        } else {
            echo $i . '<br><br>';
        }
        
       $suma += $i; 
    }
    echo "La suma de los números entre 1 y 100 es: <b>$suma</b>";
?>

