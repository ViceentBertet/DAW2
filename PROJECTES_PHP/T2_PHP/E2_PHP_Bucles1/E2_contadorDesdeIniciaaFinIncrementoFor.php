<html>
    <head>
        <title>Tabla Bucle</title>
        <style>
            table {
                border:1px solid black;
                border-collapse: collapse;
                width:125px;
                margin:auto;
                text-align: center;
            }
            td {
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
<?php
    $numInicial = 41;
    $numFinal = 58.5;
    $incremento = 2.5;
    echo '<table>';
    echo '<th>Incremento el valor en '. $incremento .'</th>';
    for (; $numInicial <= $numFinal; $numInicial += $incremento) {
       echo '<tr><td>' . $numInicial . '</td></tr>'; 
       
    }
    echo '</table>';
?>
    </body>
</html>


