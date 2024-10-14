<html>
    <head>
        <title>title</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <h3>Conversión sin control de errores</h3>
        <p><b>Realizamos la conversión a US Dollars</b></p>
        <p>Usted indicó la siguiente información:</p>
        <?php
            $cant = $_GET['euros'];
            $dolars = $cant * 1.16;
            echo "Cantidad = $cant Euros<br>";
            echo "Resultado de la conversión = $dolars US Dollars";
        ?>
        
    </body>
</html>
