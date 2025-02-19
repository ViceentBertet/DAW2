import {CartaElement} from "../components/carta.js";
let played = false;
const NUM_POKEMONS = 5;
let pokemons = "";
let maquina = "";
let jugador = "";
window.onload = function() {
    fetchPokemon();
}
async function fetchPokemon() {
    let num = await fetch ("https://pokeapi.co/api/v2/pokemon")
            .then(response => response.json())
            .then(data => data.count)
            .catch(error => error)
    pokemons = await fetch(`https://pokeapi.co/api/v2/pokemon/?limit=${num}`)
            .then(response => response.json())
            .then(data => data.results)
            .catch(error => error)
    maquina = await elegirCinco();
    jugador = await elegirCinco();
    mostrarCartasJugador();
}
async function elegirCinco() {
    let array = [];
    for (let i = 0; i < NUM_POKEMONS; i++) {
        let n = nAleatorio(pokemons.length);
        let pokemon = await fetch(pokemons[n].url)
                .then(response => response.json())
                .then(data => [data.name, data.sprites.front_default	, data.base_experience])
                .catch(error => error);
        pokemons.splice(n, 1);
        array.push(pokemon);
    }
    return array;
}
function nAleatorio (max) {
    return Math.floor(Math.random() * max) + 1;
}
function mostrarCartasJugador() {
    for (let i = 0; i < jugador.length; i++) {
        let div = crearCarta(jugador[i]);
        div.addEventListener("dblclick", jugada);
        cartasJugador.appendChild(div);
    }
}
function crearCarta(datosCarta) {
    let carta = new CartaElement(datosCarta[1], datosCarta[0], datosCarta[2]);
    return carta;
}
function jugada(){
    let carta  = this.clone();
    propio.appendChild(carta);
    if (!played) {
        played = true;
        setTimeout(maquinaJugada, 2000);
    } else {
        procesarRespuesta();
    }
    this.remove();
}
function maquinaJugada(){
    let num = nAleatorio(5) - 1;
    let carta = crearCarta(maquina[num]);
    maquina.splice(num, 1);
    rival.appendChild(carta);
    if (!played) {
        played = true;
        setTimeout(jugada(), 2000);
    } else {
        procesarRespuesta();
    }
    cartasMaquina.querySelector(".carta").remove();
}
function procesarRespuesta() {
    cargando();
}
function cargando() {
    let div = document.createElement("div");
    div.id = "cargando";
    let imgCargando = document.createElement("img");
    imgCargando.src = "./img/cargando.webp";
    div.appendChild(imgCargando);
    document.body.appendChild(div);
}