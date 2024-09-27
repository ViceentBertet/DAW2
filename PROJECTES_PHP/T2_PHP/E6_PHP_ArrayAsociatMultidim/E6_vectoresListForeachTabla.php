<html>
    <head>
        <title>E6</title>
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
            include ("E6_datPersonales.php");
            echo "<table>";
            echo "<tr><th>Nombre</th>";
            echo "<th>Apellido</th></tr>";
            foreach($vector1 as $nom => $ape) {
                echo "<tr><td>" . $nom . "</td>"
                        . "<td>" . $ape . "</td></tr>";
            }
 
            echo "</table>";
        ?>
    </body>
</html>