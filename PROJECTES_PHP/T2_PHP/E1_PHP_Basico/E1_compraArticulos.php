<html>
    <head>
        <title>Compra Articulos</title>
    </head>
    <body>
        <?php
            define("PRECIOFRENOS", 100);
            define("PRECIOACEITE", 10);
            define("PRECIORUEDAS", 4);
            define("IVA", 0.21);
            $numFrenos = 3;
            $numAceite = 1;
            $numRuedas = 5;
        ?>
        
        <p>Suponiendo que hemos comprado las siguientes unidades</p>
        
        <p>
            numFrenos = <?= $numFrenos ?><br>
            numAceite = <?= $numAceite ?><br>
            numRuedas = <?= $numRuedas ?>
        </p>
        <h4>PRECIOS DE LOS ARTÍCULOS</h4>
        
        <p>
            PRECIOFRENOS = <?= PRECIOFRENOS ?><br>
            PRECIOACEITE = <?= PRECIOACEITE ?><br>
            PRECIORUEDAS = <?= PRECIORUEDAS ?>
        </p>
        <?php
            if ($numAceite == 0|| $numFrenos == 0 || $numRuedas == 0) {
                echo "No comprados: ";
                if ($numAceite == 0) {
                    echo "aceite, ";
                }
                if ($numFrenos == 0 ) {
                    echo "frenos, ";
                }
                if ($numRuedas == 0) {
                    echo "ruedas";
                }
                echo '<h2>La petición ha de contener todos los tipos de artículo!!</h2>';
            } else {
                echo '<h2>Se han comprado todos los artículos</h2>';
                echo "Su petición es la siguiente:";
                echo '<br>';
                echo "Frenos:$numFrenos";
                echo '<br>';
                echo "Aceite:$numAceite";
                echo '<br>';
                echo "Ruedas:$numRuedas";
                echo '<br><br>';
                
                $numSolicitados = $numAceite + $numFrenos + $numRuedas;
                $subtotal = $numFrenos * PRECIOFRENOS + $numAceite * PRECIOACEITE + $numRuedas * PRECIORUEDAS;
                $total = $subtotal + $subtotal * IVA;
                echo '<b>';
                echo "Número de elementos solicitados: $numSolicitados";
                echo '<br>';
                echo "Subtotal: $subtotal";
                echo '<br>';
                echo "Total con el IVA: $total";
                echo '</b>';
            }
        ?>
    </body>
</html>


