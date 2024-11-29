<?php
    echo "<h2>Escritura en fichero en carpeta PETICIONES</h2>";
    
    define("PRECIOFRENOS", 100);
    define("PRECIOACEITE", 10);
    define("PRECIORUEDAS", 4);
    
    $fecha = getdate()['mday'] . "/" . getdate()['mon'] . "/" . getdate()['year'];
    $nom = $_GET['nom'];
    $dir = $_GET['dir'];
    $frenos = $_GET['frenos'];
    $aceite = $_GET['aceite'];
    $ruedas = $_GET['ruedas'];
    $importe = $frenos * PRECIOFRENOS + $aceite * PRECIOACEITE + $ruedas * PRECIORUEDAS;
    
    echo "Su petición Sr./Sra. $nom es la siguiente:<br>"
            . "$frenos frenos.<br>"
            . "$aceite latas de aceite.<br>"
            . "$ruedas ruedas.<br>"
            . "Importe total: $importe<br>"
            . "Intentamos volcar la información<br>"
            . "..............<br><br>";
    
    $ruta = "./E5_peticiones/E5_petic4.txt";
    $fitx = fopen($ruta, "a+");
    if ($fitx) {
        fwrite($fitx, "$fecha\t$nom\t$dir\t$frenos\t$aceite\t$ruedas <br>\n");
        echo "<i>Se ha escrito el pedido en el fichero</i>";
    } else {
        echo "<i>No se ha podido acceder al fichero</i>";
    }
    fclose($fitx);
?>

