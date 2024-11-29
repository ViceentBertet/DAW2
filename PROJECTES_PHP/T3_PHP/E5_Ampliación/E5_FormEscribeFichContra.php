<html>    
    <head>
        <title>E5_FormEscribeFichContra.php</title>
    </head>
    <body>
        <form action="E5_EscribeFichContra.php" >
            Nombre del archivo <input type="text" name="ruta" value="" /><br>
            Nº de contraseñas <input type="text" name="nPwd" value="" /><br>
            Long.de Básicos<input type="text" name="bas" value="" /><br>
            Long. de Especiales<input type="text" name="esp" value="" /><br><br>
            <input type="radio" name="ord" value="0" checked/> Caracteres Básicos - Caracteres Especiales <br>
            <input type="radio" name="ord" value="1" /> Caracteres Especiales - Caracteres Basicos <br> 
            <input type="submit" value="Enviar consulta" name="enviar" />
        </form>
    </body>
</html>