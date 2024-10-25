<?php
echo "<b>utiliza fpassthru()</b><br><br>
      <b>Visualizamos el contenido del fichero mensajes4.txt</b><br><br>
      <ul><li>Archivo completo mediante readfile()</li>
      <li>La primera línea en negrita utilizando función open() y fgets()</li>
      <li>Volcar el resto del fichero salida estándar con fpasthru()</li></ul>";
$ruta = "./ficheros/E6_mensajes4.txt";
if (file_exists($ruta)) {
    $gestor = fopen($ruta, "r");
    echo "Visualizamos con readfile()<br>";
    readfile($ruta);
    echo "<b>" . fgets($gestor) . "</b><br><br>";
    fpassthru($ruta);
    fclose($gestor);
} else echo "No existe $ruta";