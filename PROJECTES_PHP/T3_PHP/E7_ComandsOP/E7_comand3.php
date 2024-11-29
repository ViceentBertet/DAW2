<?php
echo "<strong>Ejercicio<br><br>
            Ficheros disponibles en el directorio doc. Sólo muestra los tipo .PDF y .PS<br><br>
            vista previa de los ficheros del directorio doc<br><br></strong>";
$directorio = opendir("./doc");
echo "<table style='width: 220px'>";
    echo "<tr><td style='background-color: lightgrey;'>Fichero</td>
          <td style='background-color: lightgrey;'>Tamaño</td></tr>";
    while (($archivo = readdir($directorio)) !== false) {
        $linea = explode('.', $archivo);
        if ($linea[1] == "pdf" || $linea[1] == "ps") {
            echo "<tr><td style='background-color: lightgrey;'>" . $archivo . "</td>";
            echo "<td style='background-color: lightgrey;'>" . filesize("./doc/" . $archivo) . "</td></tr>";
        }
    }
echo "</table>";
closedir($directorio);
?>
