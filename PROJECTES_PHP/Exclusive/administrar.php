<?php
    include("header.php");
?>
    <h2>Administrar</h2>
    <div class="enlaces">
<?php
    if ($_SESSION['tpo_usu'] == "Admin") {
?>
        <div class="bola"><a href="adminUsu.php">Usuarios</a></div>
<?php
    }
    if ($_SESSION['tpo_usu'] != "Cliente") {
?>
        <div class="bola"><a href="adminProd.php">Productos</a></div>
<?php
    }
?>
        <div class="bola"><a href="adminPed.php">Pedidos</a></div>
        <div class="bola"><a href="adminVal.php">Reseñas</a></div>
<?php
?>
    </div>
    <div id="protector" class="ocultar"></div>
    <div class="cerrarSes"><a href="cerrarSes.php">Cerrar sessión</a></div>
<?php
    include("footer.php");
?>