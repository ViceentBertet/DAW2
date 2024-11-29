<?php
    echo "<b>utiliza fread()</b><br><br>
            <b>Nota:vemos como fread() si que requiere apertura y cierre del fichero.</b><br><br>";
    $ruta = "./ficheros/E6_mensajes2.txt";
    if (file_exists($ruta)) {
        $gestor= fopen($ruta, "r");
        $contenido = fread($gestor, filesize($ruta));
        echo $contenido;
        fclose($gestor);
    } else echo "No existe $ruta";
?>