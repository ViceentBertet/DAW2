<html>
    <head>
        <title>Tabla Bucle</title>
        <style>
            table {
                border:1px solid black;
                border-collapse: collapse;
                width:100px;
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
    $num = 0;
    echo '<table>';
    echo '<th>Decadas</th>';
    do {
       echo '<tr><td>' . $num . '</td></tr>'; 
       $num += 10; 
    } while ($num < 101);
    echo '</table>';
?>
    </body>
</html>

