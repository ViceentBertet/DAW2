const socket = io();

window.onload = () => {
    boton.addEventListener("click", function(e) {
        if(input.value) {
            socket.emit("chat", input.value);
            const item = document.createElement("li");
            item.textContent = input.value;
            item.classList.add("enviado");
            mensajes.appendChild(item);
            input.value = "";
        }
    });

    socket.on("chat", function(msg) {
        const item = document.createElement("li");
        item.textContent = msg;
        mensajes.appendChild(item);
        window.scrollTo(0, document.body.scrollHeight);
    });
}