<html>
    <head>
        <title>Conversión con control</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <h3>Conversión con control de errores</h3>
        
        <?php
            $cant = $_GET['euros'];
            if (empty($cant)) {
                echo "<h3>Error: No hay valor</h3>";
            } else if ($cant < 0) {
                echo "<b>Oops...<br>Error $cant es negativo</b>";
            } else {
                echo "<p><b>Realizamos la conversión a US Dollars</b></p><p>Usted indicó la siguiente información:</p>";
                $dolars = $cant * 1.16;
                echo "Cantidad = $cant Euros<br>";
                echo "Resultado de la conversión = $dolars US Dollars";
            }
        ?>
    </body>
</html>
