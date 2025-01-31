<?php
    function crearConexion() {
        $hostname = 'localhost';
        $usuario = 'root';
        $pwd = '';
        $database = 'exclusivebddpruebas';
        $port = 3306;
        $caracteres = "utf8mb4";
        $cadena_conexion = "mysql:host=$hostname;dbname=$database;port=$port;charset=$caracteres;";
        return new PDO($cadena_conexion, $usuario, $pwd);
    }
    function selectAll() {
        $pdo = crearConexion();
        $query = 'SELECT * FROM producto';
        return $pdo->prepare($query, [PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL]);
    }

    function selectByType($tipo) {
        $pdo = crearConexion();
        $query = "SELECT * FROM producto where tpo_prod = '" . $tipo . "'";
        return $pdo->prepare($query, [PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL]);
    }

    function selectByPrice($precio, $operador) {
        $pdo = crearConexion();
        $query = "SELECT * FROM producto where precio " . $operador . " '" . $precio. "'";
        return $pdo->prepare($query, [PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL]);
    }
    
    
    function buscaUsuarios($usu, $pwd) {
        $pdo = crearConexion();
        $query = "SELECT * FROM usuario WHERE email = '" . $usu . "' AND pwd = '" . $pwd . "'";
        $stmt = $pdo->prepare($query, [PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL]);
        $stmt->execute();
        $n_filas = $stmt->rowCount();
        if ($n_filas == 1) {
            while ($registro = $stmt->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)) { 
                return $registro;
            }
        }
        return false;
    }
    function selectEmp() { 
        $pdo = crearConexion();
        $query = "SELECT * FROM usuario WHERE tpo_usu = 'Empleado' ";
        return $pdo->prepare($query, [PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL]);
    }
    function selectUsers() { 
        $pdo = crearConexion();
        $query = "SELECT * FROM usuario";
        return $pdo->prepare($query, [PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL]);
    }
    function addUsu($email, $nom, $pwd, $tpo_usu) {
        $pdo = crearConexion();
        $query = "INSERT INTO usuario (email, nom, pwd, tpo_usu)" . 
        "VALUES ('" . $email . "', '" . $nom . "', '" . $pwd . "', '" . $tpo_usu. "')";
        $stmt = $pdo->prepare($query, [PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL]);
        $stmt->execute();
        $n_filas = $stmt->rowCount();
        if ($n_filas == 1) {
            return true;
        }
        return false;
    }
    function deleteUsu($email) {
        $pdo = crearConexion();
        $query = "DELETE usuario WHERE email = '" . $email . "'";
        $stmt = $pdo->prepare($query, [PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL]);
        $stmt->execute();
        $n_filas = $stmt->rowCount();
        if ($n_filas == 1) {
            return true;
        }
        return false;
    }
   
    function mostrarProductos($stmt , $n_filas) {
        ?>
            <p id="nProd">Productos encontrados: <?=$n_filas?></p>
            <div class='productos'>
        <?php
            while ($registro = $stmt->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)) {
        ?>
            <div>
                <h3><?=$registro['nom']?></h3>
                <img src="<?=$registro['img']?>" alt="<?=$registro['nom']?>">
                <p class="descrip"><?=$registro['descrip']?></p>
                <p class="precio"><?=$registro['precio']?> €</p>
            </div>
        <?php
                }
        ?>
        </div>
            <?php
            $pdo = null;
    }
    function mostrarUsers($stmt , $n_filas) {
?>
        <p id="nSelect">Usuarios registrados: <?=$n_filas?></p>
        <table>
            <tr>
                <th>EMAIL</th>
                <th>NOMBRE</th>
                <th>CONTRASEÑA</th>
                <th>TIPO</th>
            </tr>
<?php
        while ($registro = $stmt->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)) {
?>
            <tr>
                <td><?=$registro['email']?></td>
                <td><?=$registro['nom']?></td>
                <td><?=$registro['pwd']?></td>
                <td><?=$registro['tpo_usu']?></td>
            </tr>
<?php
        }
?>
        </table>
<?php 
    }
?>  