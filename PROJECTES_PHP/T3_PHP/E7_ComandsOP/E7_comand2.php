<?php
    echo "<strong>Ejercicio<br><br>
            Ficheros disponibles en el directorio doc. Sólo muestra los tipo .PDF y .PS<br><br>
            vista previa de los ficheros del directorio doc<br><br></strong>";
    $directorio = opendir("./doc");
    while (($archivo = readdir($directorio)) !== false) {
        $linea = explode('.', $archivo);
        if ($linea[1] == "pdf" || $linea[1] == "ps") {
            echo $archivo . " ";
            echo filesize("./doc/" . $archivo) . "<br>";
        }
    }
    closedir($directorio);
?>
