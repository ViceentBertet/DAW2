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
            $vector = array(
                array(
                    172,165,179,163,170,174
                ),
                array(
                    "H","M","H","M","M","H"
                )       
            );
            $alturaH = 0;
            $alturaM = 0;
            $nH = 0;
            $nM = 0;

            for($j = 0; $j < count($vector[0]); $j++) {
                if ($vector[1][$j] == "H") {
                    $alturaH += $vector[0][$j];
                    $nH++;
                } else {
                    $alturaM += $vector[0][$j];
                    $nM++;
                }
            }
            $mediaH = $alturaH / $nH;
            $mediaM = $alturaM / $nM;
            echo "Contenido de Matriz<br><br>";
            echo "<table>";
            for ($i = 0; $i < count($vector); $i++) {
                echo "<tr>";
                if ($i == 0) { echo "<td>Altura</td>";}
                else {echo "<td>Sexo</td>";}
                for($j = 0; $j < count($vector[$i]); $j++) {
                    echo "<td>" . $vector[$i][$j] . "</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
            echo "<br>Tabla Resultado<br><br>";
            echo "<table>";
            echo "<tr><td></td><th>Mujeres</th><th>Hombres</th></td>";
            echo "<tr><th>Número</th><td>$nM</td><td>$nH</td></tr>";
            echo "<tr><th>Suma alturas</th><td>$alturaM</td><td>$alturaH</td></tr>";
            echo "<tr><th>Media alturas</th><td>$mediaM</td><td>$mediaH</td></tr>";
        ?>
    </body>
</html>
