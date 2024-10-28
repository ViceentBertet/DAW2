<?php
    // Como no tengo linux no lo puedo ejecutar
    echo "<b>Versión con shell_exec</b><br>"
        . "comando 1<br>";    
    $date = shell_exec('date');
    echo $date . "<br><br>"
        . "comando 2:";
    $nPalabras = shell_exec('ls | wc -w');
    echo "CUENTA LAS PALABRAS DEL LISTASDO: <br>" . $nPalabras;
?>
