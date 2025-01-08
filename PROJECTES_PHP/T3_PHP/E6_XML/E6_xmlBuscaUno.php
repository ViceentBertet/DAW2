<?php
    $nom = "La Actora";
    $encontrado = false;
    $ruta = "./peliculas.xml";
    $xml = simplexml_load_file($ruta);
    
    if($xml === false){
        echo 'No se ha podido acceder a' . $ruta;
    } else {
        foreach($xml->pelicula->personajes->personaje as $personaje) {
            if ($personaje->actor == $nom){
                echo "<h3>Información sobre el actor '$nom'</h3>";
                echo "Nombre del Personaje: $personaje->nombre<br>";
                echo "Actor: $personaje->actor<br><br>";
                $encontrado = true;
            } 
            
        }
        if (!$encontrado) {
            echo "El actor '$nom' no se encontró";
        }
    }
?>

