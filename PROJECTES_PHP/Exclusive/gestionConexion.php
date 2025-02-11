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
    /*      GESTIÓN DE PRODUCTOS   */
    function selectAll() {
        try {
            $pdo = crearConexion();
            $query = 'SELECT * FROM producto';
            $stmt = $pdo->prepare($query);            
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error al obtener productos: " . $e->getMessage();
            return false;
        }
    }

    function selectByType($tipo) {
        try {
            $pdo = crearConexion();
            $query = "SELECT * FROM producto WHERE tpo_prod = :tipo";
            $stmt = $pdo->prepare($query);
            $stmt->execute([':tipo' => $tipo]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error al obtener productos: " . $e->getMessage();
            return false;
        }
    }

    function selectByPrice($precio, $operador) {
        $pdo = crearConexion();
        try {
            $operadoresValidos = ['=', '<', '>'];
            if (!in_array($operador, $operadoresValidos)) {
                throw new InvalidArgumentException("Operador inválido");
            }
            $query = "SELECT * FROM producto WHERE precio $operador :precio";
            $stmt = $pdo->prepare($query);
            $stmt->execute([':precio' => $precio]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error al obtener productos: " . $e->getMessage();
            return false;
        } catch (InvalidArgumentException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    function anyadirProd($id, $nom, $descrip, $img, $precio, $stock, $tipo) {
        $rutaImg = subirImagen($img);
        if ($rutaImg) {
            try {
                $pdo = crearConexion();
                $query = "INSERT INTO producto (ID_prod, nom, descrip, img, precio, stock, tpo_prod) 
                          VALUES (:id, :nom, :descrip, :rutaImg, :precio, :stock, :tipo)";
                $stmt = $pdo->prepare($query);
                $stmt->execute([
                    ':id' => $id,
                    ':nom' => $nom,
                    ':descrip' => $descrip,
                    ':rutaImg' => $rutaImg,
                    ':precio' => floatval($precio),
                    ':stock' => intval($stock),
                    ':tipo' => $tipo
                ]);
                return $stmt->rowCount() === 1;
            } catch (PDOException $e) {
                echo "Error al insertar producto: " . $e->getMessage();
                return false;
            }
        }
        return false;
    }
    function subirImagen($img) {
        $dir = "img/";       
        $archivo = $dir . basename($img["name"]);
        if (file_exists($archivo) || move_uploaded_file($img["tmp_name"], $archivo)) {
            return $archivo;
        }
        return false;
    }
    function updateProd($id, $nom, $descrip, $img, $precio, $stock, $tipo) { 
        $rutaImg = subirImagen($img);
        if ($rutaImg) {
            try {
                $pdo = crearConexion();
                $query = "UPDATE producto 
                          SET nom = :nom, 
                              descrip = :descrip, 
                              img = :rutaImg, 
                              precio = :precio, 
                              stock = :stock, 
                              tpo_prod = :tipo 
                          WHERE ID_prod = :id";
                $stmt = $pdo->prepare($query);
                $stmt->execute([
                    ':id' => $id,
                    ':nom' => $nom,
                    ':descrip' => $descrip,
                    ':rutaImg' => $rutaImg,
                    ':precio' => floatval($precio),
                    ':stock' => intval($stock),
                    ':tipo' => $tipo
                ]);
                return $stmt->rowCount() > 0;
            } catch (PDOException $e) {
                echo "Error al actualizar producto: " . $e->getMessage();
                return false;
            }
        }
        return false;
    }
    function deleteProd($id) {
        try {
            $pdo = crearConexion();
            $query = "DELETE FROM producto WHERE ID_prod = :id";
            $stmt = $pdo->prepare($query);
            $stmt->execute([':id' => $id]);
            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            echo "Error al eliminar producto: " . $e->getMessage();
            return false;
        }
    }
    /*      GESTIÓN DE USUARIOS      */
    function buscaUsuarios($usu, $pwd) {
        try {
            $pdo = crearConexion();
            $query = "SELECT * FROM usuario WHERE email = :email AND pwd = :pwd";
            $stmt = $pdo->prepare($query);
            $stmt->execute([
                ':email' => $usu,
                ':pwd' => $pwd 
            ]);
            $registro = $stmt->fetch(PDO::FETCH_ASSOC);
            return $registro ?: false;
        } catch (PDOException $e) {
            echo "Error al obtener usuario: " . $e->getMessage();
            return false;
        }
    }
    function selectUsers() { 
        try {
            $pdo = crearConexion();
            $query = "SELECT * FROM usuario";
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Manejo de excepciones: Si hay un error, se captura y se muestra
            echo "Error al obtener usuarios: " . $e->getMessage();
            return false;
        }
    }
    function anyadirUsu($email, $nom, $pwd, $tpo_usu) {
        $pdo = crearConexion();
        try {
            $query = "INSERT INTO usuario (email, nom, pwd, tpo_usu) 
                      VALUES (:email, :nom, :pwd, :tpo_usu)";
            $stmt = $pdo->prepare($query);
            $stmt->execute([
                ':email' => $email,
                ':nom' => $nom,
                ':pwd' => $pwd,
                ':tpo_usu' => $tpo_usu
            ]);
            return $stmt->rowCount() === 1;
        } catch (PDOException $e) {
            echo "Error al insertar usuario: " . $e->getMessage();
            return false;
        }
    }
    function updateUsu($email, $nom, $pwd, $tpo_usu) { 
        try {
            $pdo = crearConexion();
            $query = "UPDATE usuario 
                      SET nom = :nom, 
                          pwd = :pwd, 
                          tpo_usu = :tpo_usu 
                      WHERE email = :email";
            $stmt = $pdo->prepare($query);
            $stmt->execute([
                ':email' => $email,
                ':nom' => $nom,
                ':pwd' => password_hash($pwd, PASSWORD_DEFAULT), // Hashear la contraseña
                ':tpo_usu' => $tpo_usu
            ]);
            return $stmt->rowCount() === 1;            
        } catch (PDOException $e) {
            echo "Error al actualizar usuario: " . $e->getMessage();
            return false;
        }
    }
    function deleteUsu($email) {
        try {
            $pdo = crearConexion();
            $query = "DELETE FROM usuario WHERE email = :email";
            $stmt = $pdo->prepare($query);
            $stmt->execute([':email' => $email]);
            return $stmt->rowCount() === 1;
        } catch (PDOException $e) {
            echo "Error al eliminar usuario: " . $e->getMessage();
            return false;
        }
    }
    /*          VALORACIONES        */
    function selectIdValNom($id){
        try {
            $pdo = crearConexion();
            $query = "SELECT v.ID_val, u.nom, v.ID_prod, v.descrip, v.eval 
                      FROM valoracion v 
                      JOIN usuario u ON v.email = u.email 
                      WHERE v.ID_PROD = :id";
            $stmt = $pdo->prepare($query);
            $stmt->execute([':id' => $id]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error al obtener valoraciones: " . $e->getMessage();
            return false;
        }
    }
    function selectUsuVal($usu) {
        try {
            $pdo = crearConexion();
            $query = "SELECT * FROM valoracion WHERE email = :usu";
            $stmt = $pdo->prepare($query);
            $stmt->execute([':usu' => $usu]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error al obtener valoraciones: " . $e->getMessage();
            return false;
        }
    }
    function selectAllVal(){
        $pdo = crearConexion();
        $query = "SELECT * FROM valoracion";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function anyadirVal($email, $prod, $descrip, $eval){
        try {
            $pdo = crearConexion();
            $query = "INSERT INTO valoracion (email, ID_prod, descrip, eval) 
                      VALUES (:email, :prod, :descrip, :eval)";
            $stmt = $pdo->prepare($query);
            $stmt->execute([
                ':email' => $email,
                ':prod' => $prod,
                ':descrip' => $descrip,
                ':eval' => $eval
            ]);
            return $stmt->rowCount() === 1;
        } catch (PDOException $e) {
            echo "Error al insertar valoración: " . $e->getMessage();
            return false;
        }
    }
    function updateVal($id, $email, $prod, $descrip, $eval) { 
        try {
            $pdo = crearConexion();
            $query = "UPDATE valoracion 
                      SET email = :email, 
                          ID_prod = :prod, 
                          descrip = :descrip, 
                          eval = :eval 
                      WHERE ID_val = :id";
            $stmt = $pdo->prepare($query);
            $stmt->execute([
                ':id' => $id,
                ':email' => $email,
                ':prod' => $prod,
                ':descrip' => $descrip,
                ':eval' => $eval
            ]);
            return $stmt->rowCount() === 1;
        } catch (PDOException $e) {
            echo "Error al actualizar valoración: " . $e->getMessage();
            return false;
        }
    }
    function deleteVal($id, $email, $prod) {
        try {
            $pdo = crearConexion();
            $query = "DELETE FROM usuario 
                      WHERE ID_val = :id AND email = :email AND ID_prod = :prod";
            $stmt = $pdo->prepare($query);
            $stmt->execute([
                ':id' => $id,
                ':email' => $email,
                ':prod' => $prod
            ]);
            return $stmt->rowCount() === 1;
        } catch (PDOException $e) {
            echo "Error al eliminar usuario: " . $e->getMessage();
            return false;
        }
    }
    /*          Pedidos                  */
    function selectAllPed() {
        try {
            $pdo = crearConexion();
            $query = "SELECT 
                    p.ID_pedido, 
                    p.direccion, 
                    p.entregado, 
                    p.precio_total, 
                    p.email, 
                    GROUP_CONCAT(i.ID_prod SEPARATOR ', ') AS productos,
                    GROUP_CONCAT(i.cantProd SEPARATOR ', ') AS cantidades
                FROM pedido p
                LEFT JOIN incluye i ON p.ID_pedido = i.ID_pedido
                GROUP BY p.ID_pedido;";
            $stmt = $pdo->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error al obtener pedidos: " . $e->getMessage();
            return false;
        }
    }
    function selectUsuPed($email) {
        try {
            $pdo = crearConexion();
            $query = "SELECT 
                        p.ID_pedido, 
                        p.direccion, 
                        p.entregado, 
                        p.precio_total, 
                        p.email, 
                        GROUP_CONCAT(i.ID_prod SEPARATOR ', ') AS productos,
                        GROUP_CONCAT(i.cantProd SEPARATOR ', ') AS cantidades
                      FROM pedido p
                      LEFT JOIN incluye i ON p.ID_pedido = i.ID_pedido
                      WHERE p.email = :email
                      GROUP BY p.ID_pedido;";
            
            $stmt = $pdo->prepare($query);
            $stmt->execute([
                ':email' => $email
            ]);
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error al obtener pedidos: " . $e->getMessage();
            return false;
        }
        
    }
    function anyadirPedido( $precio_total, $email) {
        try {
            $pdo = crearConexion();
        
          
            $sql = "INSERT INTO pedido (direccion, entregado, precio_total, email) 
            VALUES (:direccion, :entregado ,:precio_total, :email)";
            
            $stmt = $pdo->prepare($sql);
                        
            $dir = "Gerrería, 34";
            $entregado = false;
            
            $stmt->execute([
                ':direccion' => $dir,
                ':entregado' => $entregado,
                ':precio_total' => $precio_total,
                ':email'=> $email
            ]);
            return $pdo->lastInsertId();;
           
        } catch (Exception $e) {
            return false;
        }
    }
    function anyadirInclude ($datos, $precio_total, $email) {
        try {
            $pedido = anyadirPedido( $precio_total, $email);
            if ($pedido) {
                $pdo = crearConexion();
                $sql = "INSERT INTO incluye (ID_pedido, ID_prod, cantProd, precio) 
                VALUES (?, ?, ?, ?)";
                $stmt = $pdo->prepare($sql);
                $pdo->beginTransaction();
                foreach ($datos as $value) {
                    $stmt->execute([
                        $pedido,
                        $value['id'],
                        $value['cant'],
                        $value['precio']
                    ]);
                }
                $pdo->commit();
                return true;
            }
            return false;
        } catch (Exception $e) {
            return false;
        }
    }
    function updatePed($id, $opcion, $valor) {
        try {
            $pdo = crearConexion();
    
            $columnas_permitidas = ['direccion', 'entregado']; 
            if (!in_array($opcion, $columnas_permitidas)) {
                throw new Exception("Campo no permitido para actualización.");
            }

            $query = "UPDATE pedido SET $opcion = :valor WHERE ID_pedido = :id";
            $stmt = $pdo->prepare($query);

            $stmt->execute([
                ":valor" => $valor,
                ":id" => $id
            ]);
            return $stmt->rowCount() > 0;
        } catch (Exception $e) {
            return false;
        }
    }        

    function deletePed($id) {
        try {
            if (deleteInclude($id)) {
                $pdo = crearConexion();
                
                $query = "DELETE FROM pedido WHERE ID_pedido = :id";
                $stmt = $pdo->prepare($query);
        
                $stmt->execute([
                    ":id" => $id
                ]);
                return $stmt->rowCount() > 0;
            }

            return false;
        } catch (Exception $e) {
            return false;
        }
    }
    function deleteInclude($idPed) {
        try {
            $pdo = crearConexion(); 

            $query = "DELETE FROM incluye WHERE ID_pedido = :idPed";
            $stmt = $pdo->prepare($query);
    
            $stmt->execute(
                [':idPed' => $idPed]
            );
    
            return $stmt->rowCount() > 0;
    
        } catch (Exception $e) {
            return false;
        }
    }
    
    /*      MOSTRAR REGISTROS       */
    function mostrarProductos($array) {
        $n_filas = count($array);
?>
        <p class="margen">Productos encontrados: <?=$n_filas?></p>
        <div class='productos'>
<?php
            $usu = false;
            if (isset($_SESSION['usu'])) {                
                $usu = $_SESSION['usu'];
            }
        foreach ($array as $registro) {
            
?>
            <div id='<?=$registro['ID_prod']?>' onclick='mostrarProducto(this, "<?=$usu?>")'>
                <h3><?=$registro['nom']?></h3>
                <img src="<?=$registro['img']?>" alt="<?=$registro['nom']?>">
                <p class="descrip"><?=$registro['descrip']?></p>
                <p class="precio"><?=$registro['precio']?> €</p>
            </div>
<?php
        }
?>
        </div>
        <div id="protector" class="ocultar"></div>
<?php
    }
    function mostrarTablaProd($array) {
        $n_filas = count($array);
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
        foreach ($array as $registro) {
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
    function mostrarUsers($array) {
        $n_filas = count($array);
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
        foreach ($array as $registro) {
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
    function mostrarVal($array) {
        $n_filas = count($array);
?>
        <p class="margen">Valoraciones registradas: <?=$n_filas?></p>
        <table>
            <tr>
                <th>ID</th>
                <th>USUARIO</th>
                <th>PRODUCTO</th>
                <th>DESCRIPCIÓN</th>
                <th>EVALUACIÓN</th>
            </tr>
<?php
        foreach ($array as $registro) {
?>
            <tr>
                <td><?=$registro['ID_val']?></td>
                <td><?=$registro['email']?></td>
                <td><?=$registro['ID_prod']?></td>
                <td><?=$registro['descrip']?></td>
                <td><?=$registro['eval']?></td>
            </tr>
<?php
        }
?>
        </table>
<?php 
    }
    function mostrarPed($array) {
        $n_filas = count($array);
?>
        <p class="margen">Pedidos registrados: <?=$n_filas?></p>
        <table>
            <tr>
                <th>ID Pedido</th>
                <th>Dirección</th>
                <th>Entregado</th>
                <th>Precio Total</th>
                <th>Email</th>
                <th>Productos</th>
                <th>Cantidades</th>
            </tr>
<?php
        foreach ($array as $registro) {
?>
            <tr>
                <td><?=$registro['ID_pedido']?></td>
                <td><?=$registro['direccion']?></td>
                <td><?=$registro['entregado'] ? 'Sí' : 'No'?></td>
                <td><?=$registro['precio_total']?> €</td>
                <td><?=$registro['email']?></td>
                <td><?=$registro['productos']?></td>
                <td><?=$registro['cantidades']?></td>
            </tr>
<?php
        }
?>
        </table>
<?php
    }
?>  