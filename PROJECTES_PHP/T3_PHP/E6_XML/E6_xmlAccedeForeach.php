<?php
    $ruta = "./peliculas.xml";
    $xml = simplexml_load_file($ruta);

    if($xml === false){
        echo 'No se ha podido acceder a' . $ruta;
    } else {
         foreach($xml as $pelicula) {
            echo "<h1>Pelicula: $pelicula->titulo</h1>";
            echo "<h3>Personajes:</h3>";
            foreach($pelicula->personajes->personaje as $personaje) {
                echo "Nombre del Personaje: $personaje->nombre<br>";
                echo "Actor: $personaje->actor<br><br>";
            }
            echo "<h3>Argumento:</h3>";
            echo "$pelicula->argumento";
            echo "<h3>Puntuaciones:</h3>";
            foreach ($pelicula->puntuacion as $puntuacion) {
                echo "Tipo: " . $puntuacion['tipo'] . " - Puntuación: $puntuacion<br>";
            }
         }
    }
?>
