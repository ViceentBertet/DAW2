<html>
    <head>
        <title>E3_self2</title>
    </head>
    <body>
        <?php
            if (isset($_POST['enviar'])) {
                if (!empty($_POST['nom']) && !empty($_POST['emp'])) {
                    $nom = $_POST['nom'];
                    $emp = $_POST['emp'];
                    $tel = $_POST['tel'];
                    echo "Bienvenido $nom, de empleado de $emp y con telefono $tel";
                    exit();
                }
            }       
        ?>
        <form method="post" action="E3_self2.php">
            Nombre:
            <input type="text" name="nom" value="" /><br>
            Empresa:
            <input type="text" name="emp" value="" /><br>
            Telefono:
            <input type="text" name="tel" value="+34 " /><br>
            <input type="submit" name="enviar" value="enviar" />
        </form>
    </body>
</html>
