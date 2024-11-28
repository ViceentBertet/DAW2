<?php
    $ruta = "./ficheros/E6_mensajes7.txt";
    echo "<b>Lee Archivo con fgetc()</b><br><br>"
        . "Contenido del fichero $ruta hasta la fecha de hoy:<br><br><b>";
     if (file_exists($ruta)) {
         $gestor = fopen($ruta, "r");
         while(!feof($gestor)) {
             $letra = fgetc($gestor);
             if ($letra == "\n") echo "<br>";
             else echo $letra;
         }
         
     } else echo "El archivo no existe";
     echo '</b>';
?>
