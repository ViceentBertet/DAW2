<?php 
    include("header.php");
    include('gestionConexion.php');

    function mostrarMensaje() {
?>
        <p>Bienvenido/a <?=$_SESSION['nom']?></p>
        <a href="administrar.php">Pulsa aquí para gestionar perfil</a>
<?php
    }
?>
     <main class="formulari">
<?php
        if (!isset($_POST["usu"]) && !isset($_POST['pwd']) && !isset($_SESSION["nom"])) {
?>

        <div>

            <h3>Iniciar sesión</h3>
            <form method="POST" action="iniciaSesion.php">
                <input type="email" name="usu" placeholder="Introduce tu email">
                <input type="password" name="pwd" placeholder="Introduce tu contraseña">
                <button>Iniciar sesión</button>
            </form>
        </div>
<?php
    } else {
        if (!isset($_SESSION['usu'])) {
            $usu = $_POST["usu"];
            $pwd = $_POST['pwd'];
            $existe = buscaUsuarios($usu, $pwd);
            if ($existe) {
                $_SESSION['usu'] = $existe['email'];
                $_SESSION['nom'] = $existe['nom'];
                $_SESSION['tpo_usu'] = $existe['tpo_usu'];
                mostrarMensaje();
            } else {
?>
        <p>Usuario no encontrado</p>
        <a href="iniciaSesion.php">Volver a intentar</a>
<?php
            }
        } else {
            mostrarMensaje();
        }

?>

<?php 
    }
?>
        
    </main>
<?php
    include("footer.php");
?>