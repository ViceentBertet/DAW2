<html>
    <head>
        <title>Tabla Bucle</title>
        <style>
            table {
                border:1px solid black;
                border-collapse: collapse;
                width:150px;
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
    $numInicial = 900;
    $numFinal = 1000;
    echo '<table>';
    echo '<th>Decadas desde el '. $numInicial .' al '. $numFinal .' </th>';
    while ($numInicial <= $numFinal) {
       echo '<tr><td>' . $numInicial . '</td></tr>';
       $numInicial += 10;
    }
    echo '</table>';
?>
    </body>
</html>
