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
    /*      GESTIÓN DE PRODUCTOS    */
    function selectAll() {
        $pdo = crearConexion();
        $query = 'SELECT * FROM producto';
        return $pdo->prepare($query, [PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL]);
    }

    function selectByType($tipo) {
        $pdo = crearConexion();
        $query = "SELECT * FROM producto where tpo_prod = '$tipo'";
        return $pdo->prepare($query, [PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL]);
    }

    function selectByPrice($precio, $operador) {
        $pdo = crearConexion();
        $query = "SELECT * FROM producto where precio $operador '$precio'";
        return $pdo->prepare($query, [PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL]);
    }
    function anyadirProd($id, $nom, $descrip, $img, $precio, $stock, $tipo) {
        $pdo = crearConexion();
        $rutaImg = subirImagen($img);
        if ($rutaImg) {
            $query = "INSERT INTO producto (ID_prod, nom, descrip, img, precio, stock, tpo_prod)" . 
            "VALUES ('$id', '$nom', '$descrip', '$rutaImg', " . floatval($precio) . ", " . intval($stock) . ", '$tipo');";
            $stmt = $pdo->prepare($query, [PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL]);
            $stmt->execute();
            $n_filas = $stmt->rowCount();
            if ($n_filas == 1) {
                return true;
            }
        }
        return false;
    }
    function subirImagen($img) {
        $dir = "img/";
        print_r($img);
        $archivo = $dir . basename($img["name"]);
        if (file_exists($archivo) || move_uploaded_file($_FILES["imagen"]["tmp_name"], $archivo)) {
            return $archivo;
        }
        return false;
    }
    function updateProd($id, $nom, $descrip, $img, $precio, $stock, $tipo) { 
        $pdo = crearConexion();
        $rutaImg = subirImagen($img);
        if ($rutaImg) {
            $query = "UPDATE producto" . 
            "SET nom = '$nom', descrip = '$descrip', img = '$rutaImg', precio = " . floatval($precio) . ", stock = " . intval($stock) . ", tpo_prod = '$stock" . 
            "WHERE ID_prod = '$id';";;
            $stmt = $pdo->prepare($query, [PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL]);
            $stmt->execute();
            $n_filas = $stmt->rowCount();
            if ($n_filas == 1) {
                return true;
            }
        }
        return false;
    }
    function deleteProd($id) {
        $pdo = crearConexion();
        $query = "DELETE FROM producto WHERE ID_prod = '$id';";
        $stmt = $pdo->prepare($query, [PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL]);
        $stmt->execute();
        $n_filas = $stmt->rowCount();
        if ($n_filas == 1) {
            return true;
        }
        return false;
    }
    /*      GESTIÓN DE USUARIOS      */
    function buscaUsuarios($usu, $pwd) {
        $pdo = crearConexion();
        $query = "SELECT * FROM usuario WHERE email = '$usu' AND pwd = '$pwd'";
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
    function selectUsers() { 
        $pdo = crearConexion();
        $query = "SELECT * FROM usuario";
        return $pdo->prepare($query, [PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL]);
    }
    function anyadirUsu($email, $nom, $pwd, $tpo_usu) {
        $pdo = crearConexion();
        $query = "INSERT INTO usuario (email, nom, pwd, tpo_usu)" . 
        "VALUES ('" . $email . "', '" . $nom . "', '" . $pwd . "', '" . $tpo_usu . "')";
        $stmt = $pdo->prepare($query, [PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL]);
        $stmt->execute();
        $n_filas = $stmt->rowCount();
        if ($n_filas == 1) {
            return true;
        }
        return false;
    }
    function updateUsu($email, $nom, $pwd, $tpo_usu) { 
        $pdo = crearConexion();
        $query = "UPDATE usuario SET nom = '" . $nom . "', pwd = '" . $pwd . "', tpo_usu = '" . $tpo_usu . "' WHERE email = '" . $email . "'";;
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
        $query = "DELETE FROM usuario WHERE email = '" . $email . "'";
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
            <p class="margen">Productos encontrados: <?=$n_filas?></p>
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
    }
    function mostrarTablaProd($stmt , $n_filas) {
?>
        <p class="margen">Productos registrados: <?=$n_filas?></p>
        <table>
            <tr>
                <th>ID PRODUCTO</th>
                <th>NOMBRE</th>
                <th>DESCRIPCIÓN</th>
                <th>IMAGEN</th>
                <th>PRECIO</th>
                <th>STOCK</th>
                <th>TIPO DE PRODUCTO</th>
            </tr>
<?php
        while ($registro = $stmt->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)) {
?>
            <tr>
                <td><?=$registro['ID_prod']?></td>
                <td><?=$registro['nom']?></td>
                <td><?=$registro['descrip']?></td>
                <td><?=$registro['img']?></td>
                <td><?=$registro['precio']?></td>
                <td><?=$registro['stock']?></td>
                <td><?=$registro['tpo_prod']?></td>
            </tr>
<?php
        }
?>
        </table>
<?php 
    }
    function mostrarUsers($stmt , $n_filas) {
?>
        <p class="margen">Usuarios registrados: <?=$n_filas?></p>
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