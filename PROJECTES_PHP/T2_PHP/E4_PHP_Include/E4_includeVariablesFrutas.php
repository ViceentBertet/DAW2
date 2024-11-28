<html>
    <head>
        <title>E4_datPersonales.php</title>
        <style>
            table {
                border: 1px solid black;
            }
            th {
                border: 1px solid black;
            }
            td {
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
        <?php
            include ("E4_varsFrutas.php");
        ?>
        <table>
            <tr><th>Variable</th><th>Valor</th></tr>
            <tr><td>Fruta</td><td><?= $fruta ?></td></tr>
            <tr><td>Tamaño</td><td><?= $tamany ?></td></tr>
            <tr><td>Color</td><td><?= $color ?></td></tr>
            <tr><td>Posición</td><td><?= $pos ?></td></tr>
        </table>
    </body>
</html>

