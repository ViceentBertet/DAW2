<?php
    include("header.php");
    include("gestionConexion.php");
    if ($_SESSION['tpo_usu'] == "Admin") {
    
        if (isset($_POST["accion"])) {
            $accion = $_POST['accion'];
            
            $correcto = "";
            if ($accion == 1) {
                $correcto = anyadirUsu($_POST['email'], $_POST['nom'], $_POST['pwd'], $_POST['tpo_usu']);
            } else if ($accion == 2) {
                $correcto = updateUsu($_POST['email'], $_POST['nom'], $_POST['pwd'], $_POST['tpo_usu']);
            } else {
                $correcto = deleteUsu($_POST['email']);
            }
            if ($correcto) {
?>
                <p class="margen">La operación se ha realizado con exito</p>
<?php
            } else {
?>
                <p class="margen">La operación no se ha podido realizar</p>
<?php
        }
    }
?>
        <div class="opciones">
            <div class="ins" onclick="addUsu()">+</div>
            <div class="act" onclick="actUsu()"><img src="img/editar.png" alt="Editar"></div>
            <div class="eli" onclick="delUsu()">-</div>
        </div>
        <div id="protector" class="ocultar"></div>

<?php
        $array = selectUsers();
        mostrarUsers($array);
    } else {
?>
        <div class="formulari">
            <p>Usted no tiene permisos para estar aquí</p>
            <a href="administrar.php">Pulsa aquí para volver</a>
        </div>
<?php
    }
    include("footer.php");
?>