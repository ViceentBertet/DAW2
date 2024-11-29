<html>
    <head>
        <title>Mostrar Array como una tabla</title>
        <style>
            table {
                border:1px solid black ;
            }
            td {
                border:1px solid black ;
            }
        </style>
    </head>
    <body>
        <?php
            function mostrarArray($array) {
                echo "<table>";
                for ($i = 0; $i < count($array);$i++){
                    echo "<tr>";
                    for($j = 0; $j < count($array[$i]);$j++){
                        echo "<td>" . $array[$i][$j] . "</td>";
                    }
                    echo "</tr>";
                }
                echo "</table>";
            }
        ?>
    </body>
</html>

