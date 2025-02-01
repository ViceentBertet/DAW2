<?php
    include("header.php");
    include("gestionConexion.php");

?>
    <div class="opciones">
        <div class="ins" onclick="addUsu()">+</div>
        <div class="act" onclick="delUsu()"><img src="img/editar.png" alt="Editar"></div>
        <div class="eli" onclick="actUsu()">-</div>
    </div>
    <div id="protector" class="ocultar"></div>

<?php
    $stmt = selectUsers();
    $stmt->execute();
    $n_filas = $stmt->rowCount();
    mostrarUsers($stmt, $n_filas);
    include("footer.php");
?>