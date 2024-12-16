<html>
    <head>
        <title>Form principal</title>
    </head>
    <body>
        <form action='ppal.php' method='POST'>
            <table border='1' style='text-align:center; margin: auto;'>
            <thead>
                <tr>
                    <th>USUARIO</th>
                    <th>CONTRASEÑA</th>
                    <th>TIPO USER</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Seleccione User
                        <select name='usu' id='usu'>
                            <option value='user1'>user1</option>
                            <option value='user2'>user2</option>
                            <option value='user3'>user3</option>
                        </select>
                    </td>
                    <td>Seleccione Pass
                        <select name='pass' id='pass'>
                            <option value='pass1'>pass1</option>
                            <option value='pass2'>pass2</option>
                            <option value='pass3'>pass3</option>
                        </select>
                    </td>
                    <td>Seleccione tipo
                        <select name='tipo' id='tipo'>
                            <option value='tipo1'>tipo1</option>
                            <option value='tipo2'>tipo2</option>
                            <option value='tipo3'>tipo3</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan='3'><input type="submit" value="Enviar" /></td>
                </tr>
            </tbody>
        </table>
        </form>
    </body>
</html>