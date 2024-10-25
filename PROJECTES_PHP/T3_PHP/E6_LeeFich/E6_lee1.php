<?php
    echo "<h1>utiliza readfile()</h1><br>
    El contenido del fichero mensajes es...<br><br>
    <b>Nota: vemos como readfile() no requiere apertura y cierre del fichero</b><br>";
    $nom = "./ficheros/E6_mensajes1.txt";
    if (file_exists($nom)) readfile($nom);
    else echo "No existe";
?>
