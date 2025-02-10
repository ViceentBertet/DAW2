module.exports = app => {
    const cors = require("cors");
    const bodyParser = require('body-parser');
    const urlencodedParser = bodyParser.urlencoded({ extended: false });
    // Importamos el módulo donde se encuentran las Queries que nos devolverán los datos de la BBDD
    const usuarios = require("../models/usuarios.models.js");
    app.use(cors({
        origin: 'http://127.0.0.1:5500', // Permitir solicitudes desde tu frontend (puede ser otro dominio o puerto)
        methods: ['GET', 'POST', 'PUT', 'DELETE'], // Métodos permitidos
        allowedHeaders: ['Content-Type', 'Authorization'], // Encabezados permitidos
        credentials: true // Si necesitas enviar cookies o encabezados de autenticación
      }));
    app.use(bodyParser.json());

    // Creamos las diferentes rutas y métodos para poder realizar las diferentes acciones.
    /*************************** GET *******************************/
    //Devuelve todos los usuarios
    app.get("/usuarios", usuarios.buscarTodos);

    //Devuelve un usuario por ID
    app.get("/usuarios/:usuarioId", usuarios.buscarPorID);

    /*************************** POST *******************************/
    /*
        Después de buscar por varias web, he encontrado en 
        stackoverflow la respuesta a la cual no nos detectaba el body
        https://stackoverflow.com/questions/9177049/express-js-req-body-undefined
    */

    app.post("/usuario", urlencodedParser, usuarios.insertar);

    /*************************** PUT *******************************/
    app.put("/usuario", usuarios.actualizar)
    /*************************** DELETE *******************************/
    app.delete("/usuario", usuarios.eliminar)

};