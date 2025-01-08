<?php
    $ruta = "./peliculas.xml";
    $xml = simplexml_load_file($ruta);

    if($xml === false){
        echo 'No se ha podido acceder a' . $ruta;
    } else {
         print_r($xml);
    }
?>
