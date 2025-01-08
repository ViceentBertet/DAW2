<?php
    $nom = "Srta. Programadora";
    $ruta = "./peliculas.xml";
    $xml = simplexml_load_file($ruta);
    
    if($xml === false){
        echo 'No se ha podido acceder a' . $ruta;
    } else {
        $personaje= $xml->xpath("//personaje[nombre='$nom']");
 
        if (empty($personaje)) {
            echo "El personaje '$nom' no se encontró";
        } else {
            echo "<h3>Información sobre el personaje '$nom'</h3>"
                . "<strong>Nombre</strong>: " . $personaje[0]->nombre. "<br>"
                . "<strong>Actor</strong>: " . $personaje[0]->actor . "<br><br>";
        }
    }
?>
