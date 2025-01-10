const express = require('express');

var app = express();

//Crear función que delvuelve el mensaje
app.get('/hola', (req, res) => {
    res.send("Jordi gay");
})

app.listen(3000, function() {
    console.log(`La Aplicación está funcionando en el puerto 3000`);
});