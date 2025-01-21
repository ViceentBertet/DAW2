const express = require("express");
const http = require("http");
const socketIo = require("socket.io");

const app = express();
const server = http.createServer(app);
const io = socketIo(server);

// Para que al conectarse al puerto 3000  salga nuestro index.html
app.use(express.static('public'));

io.on("connection", (socket) => {
    console.log("Nuevo usuario conectado " + socketIo.id);

    socket.on("chat", (msg) => {
        socketIo.broadcast.emit("chat", msg);
    })
    socket.on("disconnect", () => {
        console.log("Usuario desconectado");
    })
})

const PORT = 3000;
server.listen(PORT, () => {
    console.log("Servidor corriendo en el puerto " + PORT);
})