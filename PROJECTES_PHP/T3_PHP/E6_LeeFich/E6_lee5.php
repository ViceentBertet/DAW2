<?php
    $ruta = "./ficheros/E6_mensajes5.txt";
    echo "<b>Lectura con readfile</b><br><br>"
        . "Las peticiones contenidas en $ruta hasta la fecha son:<br><br>";
    if (file_exists($ruta))readfile($ruta);
    else echo "El archivo no existe";
?>