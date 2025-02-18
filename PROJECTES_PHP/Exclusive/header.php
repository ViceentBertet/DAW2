<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peluquería y Estética</title>
    <link rel="stylesheet" href="css/estilos.css">
    <meta name="description" content="Castelló de Rugat, Mónica Bertet Mascarell, Monica Exclusive donde el lujo y la innovación se unen para brindarte un servicio personalizado. Ofrecemos tratamientos capilares de alta gama, extensiones premium y los mejores productos de peluquería, garantizando un estilo sofisticado y impecable.">
    <link rel="icon" type="image/png" href="img/tijeras.png">
    <script src="./js/script.js"></script>
</head>
<body>
    <header>

    <img src="img/compra.png" alt="Carro de la compra" onclick='verCarrito()'>
<?php   
    if(isset($_SESSION["nom"])) {
?>
        <p><a href="administrar.php" id="nombreUsuario" name="<?=$_SESSION['usu']?>"><?=$_SESSION["nom"]?></a></p>
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
<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        if (isset($data['del'])) {
            if (isset($_SESSION["carrito"])){
                unset($_SESSION["carrito"]);
            }
        }
    }
?>