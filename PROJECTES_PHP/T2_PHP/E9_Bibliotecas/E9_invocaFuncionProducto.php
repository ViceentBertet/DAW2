<?php
    include ("E9_Funcionproducto.php");
    echo "Asignamos valores a las variables:<br><br>";
    $a = 10;
    $b = 20;
    echo "multiplicando: $a <br> multiplicador: $b<br>";
    echo "<br>Invocamos a la función";
    $res = producto($a, $b);
    echo "<br>El resultade de $a x $b es <b>$res</b>";
?>