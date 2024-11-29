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
    $numInicial = 20;
    $numFinal = 30;
    $incremento = 3;
    echo '<table>';
    echo '<th>Incremento el valor en '. $incremento .'</th>';
    while ($numInicial <= $numFinal) {
       echo '<tr><td>' . $numInicial . '</td></tr>'; 
       $numInicial += $incremento; 
    }
    echo '</table>';
?>
    </body>
</html>
