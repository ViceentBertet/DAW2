<?php
    $ruta = "./ficheros/E6_mensajes5.txt";
    echo "<b>Lee Archivo con fgets</b><br><br>"
        . "Contenido del fichero $ruta hasta la fecha de hoy:<br><br><b>";
     if (file_exists($ruta)) {
         $gestor = fopen($ruta, "r");
         while(!feof($gestor)) {
             echo fgets($gestor) . "<br>";
         }
         
     } else echo "El archivo no existe";
     echo '</b>';
?>