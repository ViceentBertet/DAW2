const ws = new WebSocket("ws://localhost:3000");
let nom;
window.onload = () => {
    boton.addEventListener("click", sendMessage);
    enviarNombre.addEventListener("click", guardarNombre);
};
ws.addEventListener("message", function(event) {
    const data = JSON.parse(event.data);
    
    if (data.type === "message") {
        addMessage(data.data, false);
    }
});
function guardarNombre() {
    nom = nombre.value;
    pedirNombre.classList.toggle('ocultar');
    protector.classList.toggle('ocultar');

}

function actualizarScroll() {
    let div = document.getElementById("chat");
    div.scrollTop = '9999';
}
function sendMessage() {
    if (!msj.value) return false;
    const message = [msj.value, nom];
    
    ws.send(JSON.stringify({type: "message", data: message}));

    addMessage(message, true);
    document.getElementById("msj").value = "";
}
function addMessage(message, eresTu) {
    let div = document.createElement("div");
    let user = document.createElement("div");
    let comment = document.createElement("div");
    let msj = message[0];
    let nom = message[1];

    comment.innerText = msj;
    
    user.classList.add("username");
    comment.classList.add("msj");
    if (eresTu) {
        user.innerText = "tú";
        user.classList.add("der");
        comment.classList.add("deTi");
    } else {
        user.innerText = nom.toString().toLowerCase();
        comment.classList.add("deEl")
    };
    
    div.classList.add("cont-msj");
    div.appendChild(user);
    div.appendChild(comment);
    document.getElementById("chat").appendChild(div);
    actualizarScroll();
}