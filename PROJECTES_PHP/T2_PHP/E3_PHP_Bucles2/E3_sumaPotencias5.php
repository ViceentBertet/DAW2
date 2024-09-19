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
            $num = 5;
            $suma = 0;
            echo "<table>";
            echo "<tr><th>Listado de Potencias</th></tr>";
            for($i = 2; $i <= 16; $i++) {
               echo "<tr><td>$num</td></tr>";
               $suma += $num;
               $num = 5 ** $i;
            }
            echo "<tr><td><b>Suma: $suma</b></td></tr>";
            echo "</table>";
        ?>
    </body>
</html>

