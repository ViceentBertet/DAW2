const OPCIONES = ["piedra", "papel", "tijera", "lagarto", "spock"];
const GANAPIEDRA = ["tijera", "lagarto"];
const GANAPAPEL = ["piedra", "spock"]
const GANATIJERAS = ["papel", "lagarto"]
const GANALAGARTO = ["spock", "papel"]
const GANASPOCK = ["piedra", "tijera"]
let msj;
let opcionJugador;
let opcionMaquina;
let puntosJug = 0;
let puntosMaq = 0;
let playerWins = false;
let draw = false; 
let click;
window.onload = function() {
    cargarEventos();
}
function cargarEventos() {
    cargarOpciones();
    let items = document.querySelectorAll(".item");
    items.forEach(e => {
        e.addEventListener("mousedown", seleccionarImg);
        e.addEventListener("drop", selectOption);
    });
    seleccionado.addEventListener("dragover", admitirSoltar);
    continuar.addEventListener("click", reiniciarOpciones);
}

/**
 * Carga  las opciones que puede elegir el usuario, junto con sus eventos.
 */
function cargarOpciones() {
    let items = document.querySelectorAll(".item");
    for (let i = 0; i < OPCIONES.length; i++) {
        let img = document.createElement("img");
        img.src = "img/" + OPCIONES[i] + ".png";
        img.alt = OPCIONES[i];
        items[i].appendChild(img);
        items[i].addEventListener("dblclick", selectOption);
    }
}
/**
 * Dropear imagenes 
 */
function admitirSoltar(ev) {
    ev.preventDefault(); //Permite dropear
}
/**
 * Selecciona la opcion
 */
function selectOption() {
    let img = this.querySelectorAll("img")[0];
    if (!this.querySelectorAll("img")[0]) {
        img = click;
    }
    let clon = img.cloneNode();
    seleccionado.appendChild(clon);
    opcionJugador = img.alt;
    img.remove();
    setTimeout(deliverar, 500);
} 
/**
 * Para saber que imagen queremos dropear
 */
function seleccionarImg() {
    click = this.querySelectorAll("img")[0];
}
/**
 * La maquina elige una opción
 */
function elegir() {
    opcionMaquina = OPCIONES[getRandomInt(5)];
    enemigo.querySelectorAll("img")[0].src = "img/" + opcionMaquina + ".png";

}
/**
 * Función para crear un numero aleatorio
 * @param {*} max Valor maximo no incluido
 * @returns n aleatorio
 */
function getRandomInt(max) {
    return Math.floor(Math.random() * max);
}
function determinarGanador() {
    draw = false;
    if (opcionJugador == "piedra" && opcionMaquina != "piedra") {
        if (GANAPIEDRA.includes(opcionMaquina)) {
            playerWins = true;
        } else {
            playerWins = false;
        }
    } else if (opcionJugador == "papel" && opcionMaquina != "papel") {
        if (GANAPAPEL.includes(opcionMaquina)) {
            playerWins = true;
        } else {
            playerWins = false;
        }
    }else if (opcionJugador == "tijera" && opcionMaquina != "tijera") {
        if (GANATIJERAS.includes(opcionMaquina)) {
            playerWins = true;
        } else {
            playerWins = false;
        }
    } else if (opcionJugador == "lagarto" && opcionMaquina != "lagarto") {
        if (GANALAGARTO.includes(opcionMaquina)) {
            playerWins = true;
        } else {
            playerWins = false;
        }
    } else if (opcionJugador == "spock" && opcionMaquina != "spock") {
        if (GANASPOCK.includes(opcionMaquina)) {
            playerWins = true;
        } else {
            playerWins = false;
        }
    } else {
        draw = true;
        msj = "Empate"
    }
    if (!draw && playerWins) {
        crearMensaje(opcionJugador, opcionMaquina);
    } else if (!draw) {
        crearMensaje(opcionMaquina, opcionJugador);
    }
}
/**
 * Consigue los puntos y los asigna al ganador
 */
function sumarPuntos() {
    let puntos;
    if (!draw) {
        if (playerWins) {
            for (let i = 0; i < OPCIONES.length; i++) {
                if (opcionJugador == OPCIONES[i]) {
                    puntos = i + 1;
                }
            }
            for (let i = 0; i < puntos; i++) {
                let div = document.createElement("div");
                div.classList.add("mio");
                div.classList.add("punto");
                yo.appendChild(div);
            }
            puntosJug += puntos;
            if (puntosJug >= 10) {
                msj = "Has ganado!";
            }
        } else {
            for (let i = 0; i < OPCIONES.length; i++) {
                if (opcionMaquina == OPCIONES[i]) {
                    puntos = i + 1;
                }
            }
            for (let i = 0; i < puntos; i++) {
                let div = document.createElement("div");
                div.classList.add("suyo");
                div.classList.add("punto");
                el.appendChild(div);
            }
            puntosMaq += puntos;
            if (puntosMaq >= 10) {
                msj = "Has perdido!";
            }
        }
    } 
}
/**
 * Mostrar mensaje para despues hacer una jugada
 */
function deliverar() {
    deliveracion.classList.remove("invisible");
    proteccion.classList.remove("invisible");
    setTimeout(jugada, 2000);
}
/**
 * La maquina elige y se determina un ganador, se suman los puntos y
 * por ultimo se muestra en pantalla el mensaje
 */
function jugada() {
    deliveracion.classList.add("invisible");
    elegir();
    determinarGanador();
    sumarPuntos();
    mensaje.querySelectorAll("p")[0].innerText = msj;
    mensaje.classList.remove("invisible");
}
/**
 * Se prepara todo para poder volver a hacer una jugada, 
 * si alguien ha ganado, se reinician los puntos
 */
function reiniciarOpciones() {
    if (puntosJug >= 10 || puntosMaq >= 10) {
        puntosJug = 0;
        puntosMaq = 0;
        let divs = el.querySelectorAll("div");
        divs.forEach(e => {
            e.remove();
        })
        divs = yo.querySelectorAll("div");
        divs.forEach(e => {
            e.remove();
        })
    }
    enemigo.querySelectorAll("img")[0].src = "img/interrogante.png";
    mensaje.classList.add("invisible");
    proteccion.classList.add("invisible");

    let items = document.querySelectorAll(".item");
    items.forEach(e => {
        let img = e.querySelectorAll("img")[0]
        if (img) img.remove();
    });
    cargarOpciones();
}
/**
 * Se determina el mensaje a mostrar al acabar la jugada
 * @param {*} optionWin opcion del ganador
 * @param {*} optionLose opcion del perdedor
 */
function crearMensaje(optionWin, optionLose) {
    if (optionWin == "piedra"){
        if (optionLose == "tijera") {
            msj = "Piedra aplasta tijeras";
        } else {
            msj = "Piedra aplasta lagarto";
        }
    } else if (optionWin == "papel"){
        if (optionLose == "piedra") {
            msj = "Papel tapa piedra";
        } else {
            msj = "Papel desautoriza a Spock";
        }
    } else if (optionWin == "tijera"){
        if (optionLose == "papel") {
            msj = "Tijeras cortan papel";
        } else {
            msj = "Tijeras decapitan lagarto";
        }
    } else if (optionWin == "lagarto"){
        if (optionLose == "papel") {
            msj = "Lagarto devora papel";
        } else {
            msj = "Lagarto envenena Spock";
        }
    } else {
        if (optionLose == "tijera") {
            msj = "Spock rompe tijeras";
        } else {
            msj = "Spock vaporiza piedra";
        }
    }
}