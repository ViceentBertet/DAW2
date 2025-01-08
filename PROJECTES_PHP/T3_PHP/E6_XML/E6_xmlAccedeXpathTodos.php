<?php
    $ruta = "./peliculas.xml";
    $xml = simplexml_load_file($ruta);
    
    if($xml === false){
        echo 'No se ha podido acceder a' . $ruta;
    } else {
        $personajes = $xml->xpath("//personaje");
        echo "<h3>Personajes de la Película</h3>";
        foreach ($personajes as $personaje) {
            echo "<strong>Nombre</strong>: $personaje->nombre<br>";
            echo "<strong>Actor</strong>: $personaje->actor<br><br>";
        }
    }
?>
