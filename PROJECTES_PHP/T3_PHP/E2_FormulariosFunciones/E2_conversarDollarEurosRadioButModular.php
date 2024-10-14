<html>
    <head>
        <title>Conversión con control</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <h3>Conversión Euros-US Dollars en ambos sentidos</h3>
        
        <?php
            include ('E2_libEuroDollar.php');
            $cant = $_GET['euros'];
            $opcion = $_GET['convertir'];
            $newCant = "";
            if (empty($cant)) {
                error_vacio();
            } else if ($cant < 0) {
                error_negativo($cant);
            } else {
                if ($opcion == 1) {
                    $newCant = conv_EutoUSD($cant);
                } else {
                    $newCant = conv_USDtoEu($cant);
                }
                visualiza($cant, $newCant);
            }
        ?>
    </body>
</html>