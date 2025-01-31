<?php
    include("header.php");
    include("gestionConexion.php");

?>
    <div class="opciones">
        <div onclick="addUsu()" class="ins">+</div>
        <div onclick="" class="act"><img src="img/editar.png" alt="Editar"></div>
        <div onclick="" class="eli">-</div>
    </div>
    <div id="protector" class="ocultar"></div>

<?php

    $stmt = selectUsers();
    $stmt->execute();
    $n_filas = $stmt->rowCount();
    mostrarUsers($stmt, $n_filas);
    include("footer.php");
?>