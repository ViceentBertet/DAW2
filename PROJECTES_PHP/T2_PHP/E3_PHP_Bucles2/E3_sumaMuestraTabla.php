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
            }
        </style>
    </head>
    <body>
        <?php
            $suma = 0;
            echo "<table>";
            echo "<tr><th>Listado de Números</th></tr>";
            for($i = 200; $i <= 500; $i++) {
               echo "<tr><td>$i</td></tr>";
               $suma += $i; 
            }
            echo "<tr><td><b>Suma: $suma</b></td></tr>";
            echo "</table>";
        ?>
    </body>
</html>



