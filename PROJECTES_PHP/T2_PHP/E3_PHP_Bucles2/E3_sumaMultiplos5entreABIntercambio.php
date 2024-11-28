
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
            th {
                border:1px solid black;
                text-align: center;
            }
            td {
                border:1px solid black;
                text-align: center;
            }
   
        </style>
    </head>
    <body>
        <?php
            $a = 50;
            $b = 5;
            if ($a > 0 && $b > 0) {
                echo "<b>VALORES INTRODUCIDOS <br>A=$a<br>B=$b</b><br>";
                if ($a >> $b) {
                  $c = $a;
                  $a = $b;
                  $b = $c;
                  echo "Hay que intercambiar A y B, pues no se cumple que ANUEVOS VALORES<br>A=$a<br>B=$b";
                }
                $nMultiplos = $b / $a;
                $suma = 0;
                echo "<table>";
                echo "<tr><th>Listado de Múltiplos</th><th>Suma Acumulada</th></tr>";
                for($i = $a; $i <= $b; $i += 5) {
                    $suma += $i;
                   echo "<tr><td>$i</td><td>$suma</td></tr>";
                }
                echo "<tr><td colspan='2'><b>Multiplos generados: $nMultiplos </b></td></tr>";
                echo "</table>"; 
                
                
            } else {
                echo "<b>No podemos usar números negativos<br>";
                if($a < 0 && $b < 0) {
                    echo "Has definido A y B negativos";
                }else if($a < 0) {
                    echo "Has definido A negativo";
                } else {
                    echo "Has definido B negativos";
                }
                echo "<br>VALORES INTRODUCIDOS<br>A=$a<br>B=$b</b>";
            }
        ?>
    </body>
</html>
