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
            include ("E4_datPersonalesAlumnos.php");
        ?>
        <table>
            <tr><th colspan="2">Datos Personales</th></tr>
            <tr><td>Nombre</td><td><?= $nombre1 ?></td></tr>
            <tr><td>Apellidos</td><td><?= $ape1 ?></td></tr>
            <tr><td>Edad</td><td><?= $edad1 ?></td></tr>
            <tr><td>Tlf Móvil</td><td><?= $num1 ?></td></tr>
            <tr><th colspan="2">===========</th></tr>
            <tr><td>Nombre</td><td><?= $nombre2 ?></td></tr>
            <tr><td>Apellidos</td><td><?= $ape2 ?></td></tr>
            <tr><td>Edad</td><td><?= $edad2 ?></td></tr>
            <tr><td>Tlf Móvil</td><td><?= $num2 ?></td></tr>
            <tr><th colspan="2">===========</th></tr>
        </table>
    </body>
</html>
