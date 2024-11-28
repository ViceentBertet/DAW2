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
        <p>Nombre: <b><?= $nombre ?></b></p>
        <p>Apellidos: <b><?= $ape1 ?> <?= $ape2 ?></b></p>
        <p>Domicilio: <b><?= $domicilio ?></b></p>
        <p>Código Postal: <b><?= $cp ?></b></p>
        <p>Teléfono: <b><?= $telefono ?></b></p>
        <p>Profesión: <b><?= $profesion ?></b></p>
    </body>
</html>

