module.exports = app => {
    // Importamos el módulo donde se encuentran las Queries que nos devolverán los datos de la BBDD
    const usuarios = require("../models/usuarios.models.js");

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
    var bodyParser = require('body-parser');
    var urlencodedParser = bodyParser.urlencoded({ extended: false }); // Líneas necesarias para parsear el contenido de la petición POST

    app.post("/usuario", urlencodedParser, usuarios.insertar);

    /*************************** PUT *******************************/

    /*************************** DELETE *******************************/
};