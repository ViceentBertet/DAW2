window.onload = () => {
    boton.addEventListener("click", sendMessage);
};
const ws = new WebSocket("ws://localhost:3000");
ws.addEventListener("message", function(event) {
    const data = JSON.parse(event.data);
    
    if (data.type === "message") {
        addMessage(data.data, false);
    }
});

function sendMessage() {
    const message = document.getElementById("msj").value;

    if (!message) return false;

    ws.send(JSON.stringify({type: "message", data: message}));

    addMessage(message, true);
    document.getElementById("msj").value = "";
}
function addMessage(message, eresTu) {
    let node = document.createElement("p");
    node.innerText = message;
    
    node.classList.add("msj");
    if (eresTu) node.classList.add("deTi");
    else node.classList.add("deEl");
    document.getElementById("chat").appendChild(node);
}