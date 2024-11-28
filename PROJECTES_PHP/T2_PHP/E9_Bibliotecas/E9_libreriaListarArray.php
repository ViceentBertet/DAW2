<html>
    <head>
        <title>Mostrar Array como una tabla</title>
        <style>
            table {
                border:1px solid black ;
            }
            th {
                border:1px solid black ;
            }
            td {
                border:1px solid black ;
            }
        </style>
    </head>
    <body>
        <?php
            function listarVectorTabla($array) {
                echo "Visualiza en forma de tabla:";
                echo "<table>";
                echo "<th>ELEMENTO</th><th>VALOR</th>";
                for ($i = 0; $i < count($array);$i++){
                    echo "<tr>";
                    echo "<td>$i</td><td>$array[$i]</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
            function listarVectorNoOrdenada($array) {
                echo "En forma de lista no ordenada:";
                echo "<ul>";
                for ($i = 0; $i < count($array);$i++){
                    echo "<li>$array[$i]</li>";
                }
                echo "</ul>";
            }
        ?>
    </body>
</html>

