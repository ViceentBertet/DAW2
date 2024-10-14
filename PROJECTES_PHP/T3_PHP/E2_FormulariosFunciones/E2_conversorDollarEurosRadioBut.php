<html>
    <head>
        <title>Conversión con control</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <h3>Conversión Euros-US Dollars en ambos sentidos</h3>
        
        <?php
            define("USD",1.20302);
            $cant = $_GET['euros'];
            $opcion = $_GET['convertir'];
            if (empty($cant)) {
                echo "<h3>Error: No hay valor</h3>";
            } else if ($cant < 0) {
                echo "<b>Oops...<br>Error $cant es negativo</b>";
            } else {
                if ($opcion == 1) {
                    echo "<p><b>Realizamos la conversión a USD</b></p><p>Usted indicó la siguiente información:</p>";
                    $dolars = round($cant * USD, 2);
                    echo "Cantidad = $cant Euros<br>";
                    echo "Resultado de la conversión = $dolars USD";
                } else {
                    echo "<p><b>Realizamos la conversión a Euros</b></p><p>Usted indicó la siguiente información:</p>";
                    $dolars = round($cant / USD, 2);
                    echo "Cantidad = $cant USD<br>";
                    echo "Resultado de la conversión = $dolars Euros";
                }
            }
        ?>
    </body>
</html>
