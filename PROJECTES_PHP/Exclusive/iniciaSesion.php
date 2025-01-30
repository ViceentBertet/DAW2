<?php 
    include("header.php");
    include('gestionConexion.php');
?>
     <main class="formulari">
<?php
        if (!isset($_POST["usu"]) && !isset($_POST['pwd'])) {
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
        $existe = buscaUsuarios($_POST['usu'], $_POST['pwd']);
        if ($existe) {
            $_SESSION['usu'] = $existe['email'];
            $_SESSION['nom'] = $existe['nom'];
            $_SESSION['tpo_usu'] = $existe['tpo_usu'];
?>
            <p>Bienvenido/a <?=$_SESSION['nom']?>. Has iniciado sesión correctamente.</p>
            <a href="administrar.php">Gestionar perfil</a>
<?php
            
        } else {
?>
        <p>Usuario no encontrado</p>
        <a href="iniaSesion.php">Volver a intentar</a>
<?php
        }

?>

<?php 
    }
?>
        
    </main>
<?php
    include("footer.php");
?>