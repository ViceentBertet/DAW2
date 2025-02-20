import {CartaElement} from "../components/carta.js";
let played = false;
const NUM_POKEMONS = 5;
let pokemons = "";
let maquina = "";
let jugador = "";
let turnoMaquina;
let comprobarIzq = 0;
let comprobarDer = 0;

window.onload = async function() {
    await fetchPokemon();
    maquina = await elegirCinco();
    jugador = await elegirCinco();
    mostrarCartasJugador();
    turnoMaquina = (nAleatorio(2) === 2) ? true : false;
    turnos();
}
function turnos() {
    if (turnoMaquina) {
        comment.innerText = "Le toca a la máquina";
        setTimeout(cargando,1000);
        setTimeout(cerrarCargando, 2000);
        setTimeout(maquinaJugada, 3000);
    } else {
        comment.innerText = "Te toca!";
    }
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
    comment.innerText = `Has jugado ${carta.nombre}`;

    if (!played) {
        played = true;
        setTimeout(cargando,1000);
        setTimeout(cerrarCargando, 2000);
        setTimeout(maquinaJugada, 3000);
    } else {
        procesarRespuesta();
    }
    this.remove();
}
function maquinaJugada(){
    let num = nAleatorio(maquina.length) - 1;
    let carta = crearCarta(maquina[num]);
    maquina.splice(num, 1);
    rival.appendChild(carta);
    comment.innerText = `La máquina ha jugado ${carta.nombre}`;
    if (!played) {
        played = true;
    } else {
        procesarRespuesta();
    }
    cartasMaquina.querySelector(".carta").remove();
}
function procesarRespuesta() {
    played = false;
    cargando();
    setTimeout(cerrarCargando, 2000);
    setTimeout(resultado, 3000);
}
function cerrarCargando() {
    carg.remove();
}
function cargando() {
    let div = document.createElement("div");
    div.id = "carg";
    let imgCargando = document.createElement("img");
    imgCargando.src = "./img/cargando.webp";
    div.appendChild(imgCargando);
    document.body.appendChild(div);
    comment.innerText = "Cargando...";
}
function resultado() {
    let cRival = rival.querySelector('carta-element');
    let cJugador = propio.querySelector('carta-element');

    let nRival = cRival.clone();
    let nJugador = cJugador.clone();

    cRival.remove();
    cJugador.remove();
    let suma = nJugador.experiencia + nRival.experiencia;
    let div = document.createElement("div");

    if (nRival.experiencia > nJugador.experiencia) {
        comment.innerText = "Cartas para el rival...";
        izq.querySelector(".total").innerText = parseInt(izq.querySelector(".total").innerText) + suma;
        comprobarIzq = parseInt(izq.querySelector(".total").innerText);
        div.appendChild(nRival);
        div.appendChild(nJugador);
        izq.appendChild(div);
        turnoMaquina = true;
    } else if (nRival.experiencia < nJugador.experiencia) {
        comment.innerText = "Cartas para ti...";
        der.querySelector(".total").innerText = parseInt(der.querySelector(".total").innerText) + suma;
        comprobarDer = parseInt(der.querySelector(".total").innerText);
        div.appendChild(nJugador);
        div.appendChild(nRival);
        der.appendChild(div);
        turnoMaquina = false;
    } else {
        comment.innerText = "Empate...";
        der.querySelector(".total").innerText = parseInt(der.querySelector(".total").innerText) + suma / 2;
        izq.querySelector(".total").innerText = parseInt(izq.querySelector(".total").innerText) + suma / 2;

        comprobarIzq = parseInt(der.querySelector(".total").innerText);
        comprobarDer = parseInt(der.querySelector(".total").innerText);
        let div2 = document.createElement("div");

        div.appendChild(nRival);
        div2.appendChild(nJugador);

        izq.appendChild(div);
        der.appendChild(div2);
        turnoMaquina = false;
    }
    comprobarFinal();
}
function comprobarFinal() {
    if (maquina.length == 0 || comprobarIzq >= 1000 || comprobarDer >= 1000) {
        ganador();
    } else {
        turnos();
    }
}
function ganador() {
    if (comprobarIzq > comprobarDer) {
        comment.innerText = "Ha ganado la máquina!";
    } else if (comprobarIzq < comprobarDer) {
        comment.innerText = "Has ganado!";
    } else {
        comment.innerText = "Empate!";
    }
}