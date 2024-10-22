<?php
    echo "<h2>Gestión de ficheros en PHP</h2>";
    $ruta = "./E5_petic3.txt";
    $fitx = fopen($ruta, "a+");
    if ($fitx) {
        $fecha = getdate()['mday'] . "/" . getdate()['mon'] . "/" . getdate()['year'];
        $nom = $_GET['nom'];
        $dir = $_GET['dir'];
        fwrite($fitx, "$fecha\t$nom\t$dir <br>\n");
        echo "<b>Se ha escrito el cliente en el fichero</b>";
    } else {
        echo "<b>No se ha podido acceder al fichero</b>";
    }
    fclose($fitx);
?>