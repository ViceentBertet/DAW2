<?php
   session_start();
   if (isset($_POST['usu']) && isset($_POST['pwd'])) {
        $usu = $_POST['usu'];
        $pwd = $_POST['pwd'];
        $hostname = 'localhost';
        $username = 'root';
        $password = '';
        $database = 'bd1_dwes';
    
        $link = mysqli_connect($hostname, $username, $password, $database);
        if (!$link) {
            echo "Error: No se pudo conectar a MYSQL" . PHP.EOL;
            echo "Error de depuracion: " . mysqli_connect_errno() . "<br>";
        } else {
            $query = "SELECT * FROM usuarios "
                    . "WHERE user='$usu' AND pass='$pwd'";
            $resultat = mysqli_query($link, $query);
            $num_filas = mysqli_affected_rows($link);
            if ($num_filas > 0) {
                $_SESSION['usu'] = $usu;
                echo "Usuario existente!<br>";
                echo "<a href='E11_login_valida.php'>Ir a pagina principal</a>";
            }  
            mysqli_close($link);
        }
   } 
?>

