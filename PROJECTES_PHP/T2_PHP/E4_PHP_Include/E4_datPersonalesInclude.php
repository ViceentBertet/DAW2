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
            include ("E4_datPersonales.php");
        ?>
        <table>
            <tr><th colspan="2">Datos Personales</th></tr>
            <tr><td>Nombre</td><td><?= $nombre ?></td></tr>
            <tr><td>Apellidos</td><td><?= $ape ?></td></tr>
            <tr><td>Edad</td><td><?= $edad ?></td></tr>
            <tr><td>Tlf Móvil</td><td><?= $num ?></td></tr>
        </table>
    </body>
</html>



