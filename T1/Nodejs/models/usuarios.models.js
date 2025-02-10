const sql = require("./db.js");

// Construimos una función llamada Usuario (a modo de objeto)
function Usuario(usuario) {
    this.email = usuario.email;
    this.name = usuario.name;
    this.password = usuario.password;
};

// Definimios las funciones que forman parte de Usuario, a las que accederemos desde la ruta correspondiente en función de la acción que queramos realizar: INSERT, SELECT, UPDATE o DELETE.
/*************************** GET *******************************/
Usuario.buscarTodos = (request, result) => {
    sql.query("SELECT * FROM usuario", (err, res) => {
        console.log("Usuarios: ", res); // Información que mostramos en la consola donde estamos ejecutando NodeJS (Servidor)
        result.json(res); // Información que enviamos al cliente.
    });
};

// Donde en la función anterior teníamos una petición (request) sin datos de entrada, ahora tenemos un usuarioID definido en la ruta.
Usuario.buscarPorID = (request, result) => {
    sql.query(`SELECT * FROM usuario WHERE idusuario = ${request.params.usuarioId}`, (err, res) => {
        // Si la respuesta de la query devuelve una longitud de 1 o más valores, mostramos el usuario encontrado.
        console.log(res);
        if (res.length) {
            console.log("Usuario encontrado: ", res[0]); // Información que mostramos en la consola donde estamos ejecutando NodeJS (Servidor)
            result.json(res[0]); // Información que enviamos al cliente.
        } else result({ kind: "not_found" }, null); // No existe un usuario con ese ID
    });
};

/*************************** POST *******************************/
Usuario.insertar = (request, result) => {
    const datos = request.body;
    console.log(datos);

    const query = `INSERT INTO usuario (nom, pwd, email) VALUES (?, ?, ?)`;
    const values = [datos["nom"], datos["pwd"], datos["email"]];

    sql.query(query, values, (err, res) => {
        if (err) {
            console.error("Error al insertar el usuario: ", err); 
            return result.status(500).json({ mensaje: "Error al insertar el usuario", error: err.message });
        }
        if (res.affectedRows > 0) {
            console.log("Usuario insertado con éxito");
            return result.json({ mensaje: "Usuario insertado con éxito" });
        } else {
            console.log("No se insertó el usuario");
            return result.status(400).json({ mensaje: "No se insertó el usuario" });
        }
    });
};
/*************************** PUT *******************************/
Usuario.actualizar = (request, result) => {
    const datos = request.body;
    console.log(datos);
    if (!datos["opcion"] || !datos["newValue"] || !datos["id"]) {
        return result.status(400).json({ mensaje: "Faltan datos necesarios para actualizar el usuario" });
    }

    const query = `UPDATE usuario SET ?? = ? WHERE idusuario = ?`;
    const values = [datos["opcion"], datos["newValue"], datos["id"]];

    sql.query(query, values, (err, res) => {
        if (err) {
            console.error("Error al actualizar el usuario: ", err);
            return result.status(500).json({ mensaje: "Error al actualizar el usuario", error: err.message });
        }
        if (res.affectedRows > 0) {
            console.log("Usuario actualizado con éxito");
            return result.json({ mensaje: "Usuario actualizado con éxito" });
        } else {
            console.log("No se encontró el usuario o no se realizaron cambios");
            return result.status(404).json({ mensaje: "No se encontró el usuario o no se realizaron cambios" });
        }
    });
};

Usuario.eliminar =  (req, res) => {
    const id = req.body["id"];

    sql.query(`DELETE FROM usuario WHERE idusuario = ?`, [id], (err, result) => {
        if (err) {
            return res.status(500).json({ mensaje: "Error al eliminar el usuario", error: err });
        }
        res.json({ mensaje: `Usuario con id ${id} eliminado con éxito` });
    });
};


/*************************** DELETE *******************************/
module.exports = Usuario;