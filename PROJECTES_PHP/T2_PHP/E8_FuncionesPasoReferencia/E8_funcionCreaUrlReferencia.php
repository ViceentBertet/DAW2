<?php
    function creaUrl($protocolo, $tipoServicio, &$nombre, $tipoOrg, $sufijo) {
        $nombre = $protocolo . "://" . $tipoServicio . "." . $nombre . "." . $tipoOrg . "." . $sufijo;
    }
    $a = "http";
    $b = "www";
    $c = "lagaceta";
    $d = "com";
    $e = "es";
    echo "Invocando a función...<br><br>";
    creaUrl($a, $b, $c, $d, $e);
    echo "La URL completa es...<br><br>";
    
    echo $c;
    
?>
