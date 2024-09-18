<html>
    <head>
        <title>E3_sumaMuestraTabla</title>
        <style>
            table {
                border:1px solid black;
            }
            tr {
                border:1px solid black;
            }
            td {
                border:1px solid black;
                text-align: center;
            }
   
        </style>
    </head>
    <body>
        <?php
            $suma = 0;
            echo "<table>";
            echo "<tr><th>Listado de Números</th><th>Suma Acumulada</th></tr>";
            for($i = 1; $i <= 500; $i++) {
               echo "<tr><td>$i</td><td>$suma</td></tr>";
               $suma += $i; 
            }
            echo "<tr><td colspan='2'><b>Suma: $suma</b></td></tr>";
            echo "</table>";
        ?>
    </body>
</html>
