<?php
    echo "<h2>Gestión de ficheros en PHP</h2>"
            . "<b>Genera un fichero .txt en directorio actual</b><br>"
            . "Version sin comprobación de errores en acceso al archivo<br>"
            . "la información se AÑADE al archivo cada vez que ejecutamos";
    $ruta = "./E5_mensajes2.txt";
    $fitx = fopen($ruta, "a+");
    if ($fitx) {
        fwrite($fitx, "Primera línea del saludo.\n<br>Segunda línea del saludo.\n<br>");
    }
    fclose($fitx);
?>