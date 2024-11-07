<?php
    $segundos = 365*24*60*60;
    $fechaExp = time() + $segundos;
    if (isset($_COOKIE['contador'])){
        $veces = $_COOKIE['contador'] + 1;
        setcookie('contador', $veces, $fechaExp);
        $mensaje = "Número de visitas a la web: " . $_COOKIE['contador'];
        echo $mensaje . "<br>";
    } else {
        $veces = 1;
        setcookie('contador', $veces, $fechaExp);
        $mensaje = "Has visitado la pagina por primera vez";
        echo $mensaje . "<br>";
    }
    
?>
