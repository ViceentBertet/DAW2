
<html>
    <head>
        <title>E5_arraySumaTabla</title>
        <style>
            table {
                border:1px solid black;
            }
            tr {
                border:1px solid black;
            }
            th {
                border:1px solid black;
                text-align: center;
            }
            td {
                border:1px solid black;
                text-align: center;
                width:75px;
            }
   
        </style>
    </head>
    <body>
        <?php
            $vector = range(100, 500, 100);
            $suma = 0;
            echo "<table>";
            echo "<tr><th>Posición</th>";
            echo "<th>Valor</th></tr>";
            for($i = 0; $i < count($vector); $i++) {
                echo "<tr><td>" . $i . "</td>";
                echo "<td>" . $vector[$i] . "</td></tr>";
                $suma += $vector[$i];
            }
            echo "<tr><th>SUMA</th>";
            echo "<th>" . $suma . "</th></tr>";
            echo "</table>"
        ?>
    </body>
</html>
