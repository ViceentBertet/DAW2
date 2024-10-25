<?php

    echo "<b>utiliza fread()</b><br><br>
                <b>Nota:vemos como fread() si que requiere apertura y cierre del fichero.</b><br><br>";
    $ruta = "./ficheros/E6_mensajes2.txt";
    if (file_exists($ruta)) {
        $size = filesize($ruta);
        $gestor = fopen($ruta, "r");
        $contenido = fread($gestor, $size);
        echo $contenido;
        fclose($gestor);
        echo "<br><br>El tamaño es:<br><b>$size</b> caracteres";
    } else echo "No existe $ruta";
?>