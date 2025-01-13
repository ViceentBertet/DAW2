import WebSocket, {WebSocketServer} from "ws";

const port = 3000;
const wss = new WebSocketServer({port: port});

wss.on("connection", function connection(ws) {
    ws.on("message", function message(msj) {
        const data = JSON.parse(msj);

        if (data.type === "message") {
            wss.clients.forEach((client) => {
                if(client!== ws && client.readyState === WebSocket.OPEN) {
                    client.send(JSON.stringify({type: "message", data: data.data}));
                }
            });
        }
    })
})