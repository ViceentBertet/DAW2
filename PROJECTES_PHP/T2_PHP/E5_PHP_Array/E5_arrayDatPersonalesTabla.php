
<html>
    <head>
        <title>E5_arraySumaTabla</title>
        <style>
            table {
                border:1px solid black;
            }
            tr {
                border:1px solid black;
            }
            th {
                border:1px solid black;
                text-align: center;
            }
            td {
                border:1px solid black;
                text-align: center;
                width:75px;
            }
   
        </style>
    </head>
    <body>
        <?php
        
            include ("E5_datPersonales.php");
            $vector = array($nombre1, $ape1, $edad1, $num1, $nombre2, $ape2, $edad2, $num2);
            $cabecera = array("Nombre", "Apellido", "Edad", "Teléfono");
            echo "<table>";
            echo "<tr><th colspan='2'>Datos Personales</th></tr>";
            for($i = 0; $i < count($vector); $i++) {
                if($i % 4 == 0){
                    reset($cabecera);
                }
                echo "<tr><th>" . current($cabecera) . "</th>";
                echo "<td>" . $vector[$i] . "</td></tr>";
                next($cabecera);
            }
            echo "</table>"
        ?>
    </body>
</html>

