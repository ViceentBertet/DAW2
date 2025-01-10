import {CartaElement} from "../components/carta.js";
window.onload = () => {
    boton.addEventListener("click", cargarCarta);
}
function cargarCarta() {
    let carta = new CartaElement("./img/pokemon.jpg", "El Movidas", 2000);
    contenedorCartas.append(carta);
}