<?php
    include("header.php");
    $hostname = 'localhost';
    $usuario = 'root';
    $pwd = '';
    $database = 'exclusivebddpruebas';
    $port = 3306;
    $cadena_conexion = "mysql:host=$hostname;dbname=$database;port=$port;";
    try {
        $pdo = new PDO($cadena_conexion, $usuario, $pwd);
        $query = 'SELECT * FROM producto';
        $stmt = $pdo->prepare($query, [PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL]);
        $stmt->execute();
        $n_filas = $stmt->rowCount();
?>
    <p>Productos encontrados: <?=$n_filas?></p>
    <div class='productos'>
<?php
        while ($registro = $stmt->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT)) {
?>
    <div>
        <h3><?=$registro['nom']?></h3>
        <img src="<?=$registro['img']?>" alt="<?=$registro['nom']?>">
        <p><?=$registro['precio']?> €</p>
        <p><?=$registro['descrip']?></p>

     </div>
<?php
        }
        echo "</div>";
        $pdo = null; //Así se cierra la conexión
    } catch (PDOException $e) {
        echo "Error con la base de datos: <b>$database</b><br>" . $e->getMessage(); 
    }
    include("footer.php");
?>