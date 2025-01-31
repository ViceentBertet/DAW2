<?php
    include("header.php");
?>
    <h2>Filtrar por</h2>
    <div class="enlaces">
<?php
    if ($_SESSION['tpo_usu'] != "Cliente") {
?>
        <div class="bola"><a href="adminUsu.php">Usuarios</a></div>
<?php
    }
?>
        <div class="bola"><a href="adminVal.php">Reseñas</a></div>

<?php
?>
    </div>
    <div id="protector" class="ocultar"></div>
<?php
    include("footer.php");
?>