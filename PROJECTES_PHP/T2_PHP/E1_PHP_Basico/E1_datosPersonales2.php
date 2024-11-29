<!DOCTYPE html>
<html>
    <head>
        <title>E1_datosPersonales2</title>
    </head>
    <body>
        <?php
            $nombre = "Josep Vicent";
            $ape1 = "Perelló";
            $ape2 = "Bertet";
            $domicilio = "C/ de la Gerrería, 34";
            $cp = "46841";
            $telefono = "69447191";
            $profesion = "Técnico Superior en DAW";
        ?>
        <p>Nombre: <?= $nombre ?></p>
        <p>Apellidos: <?= $ape1 ?> <?= $ape2 ?></p>
        <p>Domicilio: <?= $domicilio ?></p>
        <p>Código Postal: <?= $cp ?></p>
        <p>Teléfono: <?= $telefono ?></p>
        <p>Profesión: <?= $profesion ?></p>
    </body>
</html>

