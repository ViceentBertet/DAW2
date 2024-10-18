<html>    
    <head>
        <title>E4_formGeneraContrasenyaVarias</title>
    </head>
    <body>
        <form action="E4_generaContrasenyaVarias.php" >
            Nº de contraseñas <input type="text" name="nPwd" value="" /><br>
            Long.de Básicos<input type="text" name="bas" value="" /><br>
            Long. de Especiales<input type="text" name="esp" value="" /><br><br>
            <input type="radio" name="ord" value="0" checked/> Caracteres Básicos - Caracteres Especiales <br>
            <input type="radio" name="ord" value="1" /> Caracteres Especiales - Caracteres Basicos <br> 
            <input type="submit" value="Enviar consulta" name="enviar" />
        </form>
    </body>
</html>