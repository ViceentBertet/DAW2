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
            echo "<tr><th>Listado de Múltiplos</th></tr>";
            for($i = 1; $i <= 15; $i++) {
               echo "<tr><td>$num</td></tr>";
               $suma += $num;
               $num += 5;
            }
            echo "<tr><td><b>Suma: $suma</b></td></tr>";
            echo "</table>";
        ?>
    </body>
</html>
