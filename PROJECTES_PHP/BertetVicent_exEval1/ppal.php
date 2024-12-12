<html>
    <head>
        <meta charset='UTF-8'>
        <title>PRINCIPAL</title>
    </head>
    <body>
    <?php
        function fValidarUsuario ($usu, $pwd, $tipo) {
            echo "FUNCION fValidarUsuario<br>";
            $hostname = 'localhost';
            $username = 'root';
            $password = '';
            $database = 'notasdb_dwes';

            $link = mysqli_connect($hostname, $username, $password, $database);

            if (!$link) {
                echo "Error: No se pudo conectar a MYSQL" . PHP.EOL;
                echo "Error de depuracion: " . mysqli_connect_errno() . "<br>";
            } else {
                echo "¡Conexión exitosa! <br><b>BD: $database</b><br><br>";

                $query = "SELECT * FROM usuarios "
                        . "WHERE User='$usu' AND Pass='$pwd' AND Tipo = '$tipo'";
                echo "Veamos si el usuario existe...<br><br>";

                $resultat = mysqli_query($link, $query);            
                $num_filas = mysqli_affected_rows($link);
                echo "Cerramos Conexión<br>";
                mysqli_close($link);
                if ($num_filas > 0) {
                    return true;
                }  
                return false;
            } 
        }
        function fcargaNotasPriBDaMat(&$MATPRIM){
            echo "FUNCION fcargaNotasPriBDaMat<br>";
            $hostname = 'localhost';
            $username = 'root';
            $password = '';
            $database = 'notasdb_dwes';

            $link = mysqli_connect($hostname, $username, $password, $database);

            if (!$link) {
                echo "Error: No se pudo conectar a MYSQL" . PHP.EOL;
                echo "Error de depuracion: " . mysqli_connect_errno() . "<br>";
            } else {
                echo "¡Conexión exitosa! <br><b>BD: $database</b><br><br>";

                $query = "SELECT * FROM notasprim";

                $resultat = mysqli_query($link, $query);            
                $num_filas = mysqli_affected_rows($link);
                echo "Num filas existentes (SELECT): $num_filas<br><br>";
                $filas = mysqli_fetch_all($resultat, MYSQLI_ASSOC);
                $MATPRIM[0] = ["ALUMNO", "MEDIA 1º", "FECHA APROB"];
                $i = 1;
                foreach ($filas as $filaActual) {
                    $MATPRIM[$i][0] = $filaActual['NomAlum'];
                    $MATPRIM[$i][1] = $filaActual['MediaPrim'];
                    $MATPRIM[$i][2] = $filaActual['FechAprobado'];

                    $i++;
                }
                echo "Cerramos Conexión<br><br>";
                mysqli_close($link);
            } 
        }
        function fVisualizaDatosMATPRIM($MATPRIM) {
            echo "FUNCION fVisualizaDatosMATPRIM";
            echo "<table border='1'>";
            for ($i = 0; $i < count($MATPRIM);$i++) {
                echo "<tr>";            
                for ($j = 0; $j < count($MATPRIM[$i]);$j++) {
                    echo "<td>";
                    echo $MATPRIM[$i][$j];
                    echo "</td>";
                }
                echo "</tr>";            
            }
            echo "</table><br><br>";

        }
        function fEscribeDatosMATPRIMaARCH($ruta, $MATPRIM) {
            echo "<h2>Gestión de ficheros en PHP</h2>";
            $fitx = fopen($ruta, "a+");
            if ($fitx) {
                for ($i = 0; $i < count($MATPRIM);$i++) {
                    $linea = $MATPRIM[$i][0] . "\t" . $MATPRIM[$i][1] . "\t" . $MATPRIM[$i][2] . "\n";
                    fwrite($fitx, $linea);
                }
                echo "<b>Se ha escrito la matriz en el fichero</b><br><br>";
            } else {
                echo "<b>No se ha podido acceder al fichero</b><br><br>";
            }
            fclose($fitx);
        }
        function fcargaSegBDaMat(&$MATSEGUN){
            echo "FUNCION fcargaNotasPriBDaMat<br>";
            $hostname = 'localhost';
            $username = 'root';
            $password = '';
            $database = 'notasdb_dwes';

            $link = mysqli_connect($hostname, $username, $password, $database);

            if (!$link) {
                echo "Error: No se pudo conectar a MYSQL" . PHP.EOL;
                echo "Error de depuracion: " . mysqli_connect_errno() . "<br>";
            } else {
                echo "¡Conexión exitosa! <br><b>BD: $database</b><br><br>";

                $query = "SELECT * FROM notasseg";

                $resultat = mysqli_query($link, $query);            
                $num_filas = mysqli_affected_rows($link);
                echo "Num filas existentes (SELECT): $num_filas<br><br>";
                $filas = mysqli_fetch_all($resultat, MYSQLI_ASSOC);
                $MATSEGUN[0] = ["ALUMNO", "ASIGNATURAº", "NOTA"];
                $cont = 1;
                foreach ($filas as $filaActual) {
                    $MATSEGUN[$cont][0] = $filaActual['NomAlum'];
                    $MATSEGUN[$cont][1] = $filaActual['NomAsig'];
                    $MATSEGUN[$cont][2] = $filaActual['NotaAsig'];   
                    $cont++;
                }
                echo "<table border='1'>";
                for ($i = 0; $i < count($MATSEGUN);$i++) {
                    echo "<tr>";            
                    for ($j = 0; $j < count($MATSEGUN[$i]);$j++) {
                        echo "<td>";
                        echo $MATSEGUN[$i][$j];
                        echo "</td>";
                    }
                    echo "</tr>";            
                }
                echo "</table><br><br>";
                echo "Cerramos Conexión<br><br>";
                mysqli_close($link);
            } 
        }
        function fEscribeMediasaBD ($matriz, $nom_tabla) {
            $hostname = 'localhost';
            $usuario = 'root';
            $pwd = '';
            $database = 'notasdb_dwes';
            $port = 3306;
            $cadena_conexion = "mysql:host=$hostname;dbname=$database;port=$port;";

             try {
                $pdo = new PDO($cadena_conexion, $usuario, $pwd);
                $matDatos = [
                    [20, 'art1', 20, 20],
                    [21, 'art', 21,21]
                ];
                $insert_query = "INSERT INTO $nom_tabla"
                        . "(NomAlum, MediaPri, MediaSeg, MediaCiclo) "
                        . "VALUES (?,?,?,?)";
                $stmt = $pdo->prepare($insert_query);
                $pdo->beginTransaction();
                foreach ($matriz as $row) {
                    $stmt->execute($row);
                }
                $pdo->commit();
                echo "Datos introducidos correctamente";
                $pdo = null; //Así se cierra la conexión
            } catch (PDOException $e) {
                $pdo->rollBack();
                echo "Error con la base de datos: <b>$database</b><br>" . $e->getMessage(); 
            }
        }
        function fEscribeMediasaArchivo($ruta, $matriz) {
            $fitx = fopen($ruta, "a+");
            if ($fitx) {
                for ($i = 0; $i < count($matriz);$i++) {
                    $linea = $matriz[$i][0] . "\t" . $matriz[$i][1] . "\t" . $matriz[$i][2] . "\n";
                    fwrite($fitx, $linea);
                }
                echo "Se ha escrito la matriz en el fichero<br><br>";
            } else {
                echo "No se ha podido acceder al fichero<br><br>";
            }
            fclose($fitx);
        }
        function fvisualizaMediasDeArch($fitx) {
            if (file_exists($fitx)) {
                $gestor = fopen($fitx, "r");
                while(!feof($gestor)) {
                    $letra = fgetc($gestor);
                    if ($letra == "\n") echo "<br>";
                    else echo $letra;
                }
            } else echo "No existe";
        }
        
        $usu = $_POST['usu'];
        $pwd = $_POST['pass'];
        $tipo = $_POST['tipo'];
        if (fValidarUsuario($usu, $pwd, $tipo)) {
            echo "Existe el usuario Seleccionado<br><br>";
            echo '<b>Carga datos de BD - tabla NOTASPRIM...</b><br><br>';
            fcargaNotasPriBDaMat($MATPRIM);
            echo '<b>Visualiza datos de MATRIZ - tabla NOTASPRIM...</b><br><br>';
            fVisualizaDatosMATPRIM($MATPRIM);
            echo '<b>Escribe datos de Matriz en archivo notasPrimero.txt...</b><br><br>';
            $ruta1 = './notasPrimero.txt';
            fEscribeDatosMATPRIMaARCH($ruta1, $MATPRIM);
            echo '<b>Lee BD datos de Segundo y los pasa MATRIZ...</b><br><br>';
            fcargaSegBDaMat($MATSEGUN);
            echo '<b>Escribe Matriz MEDIAS en tabla MEDIAS de la BD</b><br><br>';
            $nom_tabla = "MEDIAS";
            $matriz = [
                ["PILAR","9","7","7.3"],
                ["HUGO","8","7.4","7.5"],
                ["JESUS","7","6.2","6.3"],
                ["RICARDO","6","5.8","5.8"],
                ["ARTURO","5","8","7.6"],
                ["MELISSA","5","6.8","6.5"]];
            fEscribeMediasaBD($matriz, $nom_tabla);
            echo '<br><br><b>Escribe Matriz MEDIAS en NOTASCICLO.dat...</b><br><br>';
            $ruta2 = "./NOTASCICLO.dat";
            fEscribeMediasaArchivo($ruta2, $matriz);
            echo '<b>Visualizar contenido en NOTASCICLO.dat...</b><br><br>';
            fvisualizaMediasDeArch($ruta2);
        }
    ?>

    </body>
</html>
