<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MONICA EXCLUSIVE</title>
    <link rel="stylesheet" href="css/estilos.css">
    <script src="./js/script.js"></script>
</head>
<body>
    <header>
    <img src="img/compra.png" alt="Carro de la compra">
<?php   
    if(isset($_SESSION["nom"])) {
?>
        <p><a href="administrar.php"><?=$_SESSION["nom"]?></a></p>
<?php
    }
?>
        <ul>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="productos.php">Productos</a></li>
            <li><a href="pedirCita.php">Pide cita</a></li>
            <li><a href="iniciaSesion.php">Inicia sesión</a></li>
        </ul>
    </header>
