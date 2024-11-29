let mandos = "wasd";
let cuadros;
let iniciar = true;
let posPers = 10;
let ultLetra = "s";
const POSMUROS = [22, 26, 30, 34, 38,
                 85, 89, 93, 97, 101, 
                 148, 152, 156, 160, 164,
                 211, 215, 219, 223, 227];
window.onload = function() {
    cargarMapa();
    cargarEventos();
}

function cargarEventos() {
    document.addEventListener("keypress", teclaPresionada);
}
/**
 * Asigna a los cuadros correspondientes su valor
 */
function cargarMapa() {
    let fila = 0;
    let columna = 0;
    let pos = 0;
    for(let i = 0; i < 13*21; i++) {
        let div = document.createElement('div');
        main.appendChild(div);
    }
    cuadros = main.querySelectorAll("div");
    for (let i = 0; i < cuadros.length; i += 21) {
        for (let j = 0; j < 21; j++) {
            if (fila % 3 != 0 && columna % 4 != 0) {
                cuadros[pos].classList.toggle("muro");
            } else {
                cuadros[pos].classList.toggle("camino");
            }
            columna++;
            pos++; 
        }
        columna = 0;
        fila++;
    }
}
function teclaPresionada(e) {
    if(mandos.includes(e.key)) {
        moverPersonaje(e.key);
    }
}
function moverPersonaje(letra) {
    if (iniciar && letra == "s" || !iniciar) {
        cambiarAnterior(letra);
        if (letra == "w") { //Arriba
            moverArriba();
        } else if (letra == "a"){ // Izquierda
            moverIzquierda();
        } else if (letra == "s"){ //Abajo
            moverAbajo();
        } else { // Derecha
            moverDerecha();
        }
        // Se controla que en el caso de haber pasado por encima, se borren los pasos y aparezca el personaje
        if (cuadros[posPers].classList.contains("pasos-h"))cuadros[posPers].classList.remove("pasos-h");
        if (cuadros[posPers].classList.contains("pasos-v"))cuadros[posPers].classList.remove("pasos-v");
        comprobarMuros();
    } 
}
function moverArriba() {
    let newPos = posPers;
    if (posPers - 21 > -1) {
        newPos = posPers - 21;
    }
    if (cuadros[newPos].classList.contains("muro")) {
        newPos = posPers;
    }
    cuadros[newPos].classList.toggle("pers-arr");
    posPers = newPos;
    
    ultLetra = "w";

}
function moverIzquierda() {
    let newPos = posPers;
    if (posPers - 1 > -1) {
        newPos = posPers - 1;
    }
    if (cuadros[newPos].classList.contains("muro") || posPers % 21 == 0) {
        newPos = posPers;
    }
    cuadros[newPos].classList.toggle("pers-izq");
    posPers = newPos;
    
    ultLetra = "a";

}
function moverAbajo() {
    if (!iniciar) {
        let newPos = posPers;
        if (posPers + 21 < cuadros.length) {
            newPos = posPers + 21;
        }
        if (cuadros[newPos].classList.contains("muro")) {
            newPos = posPers;
        }
        cuadros[newPos].classList.toggle("pers-abj");
        posPers = newPos;
    } else {
        inicio.classList.toggle("pers-abj");
        inicio.classList.toggle("camino");
        iniciar = false;
    }
    ultLetra = "s";
}
function moverDerecha() {
    let newPos = posPers;
    if (posPers + 1 < cuadros.length) {
        newPos = posPers + 1;
    }
    if (cuadros[newPos].classList.contains("muro")|| newPos % 21 == 0) {
        newPos = posPers;
    }
    cuadros[newPos].classList.toggle("pers-der");
    posPers = newPos;
    ultLetra = "d";
}
function cambiarAnterior(){
    if (ultLetra == "w") {
        cuadros[posPers].classList.toggle("pers-arr");
        cuadros[posPers].classList.add("pasos-v");
    } else if (ultLetra == "a") {
        cuadros[posPers].classList.toggle("pers-izq");
        cuadros[posPers].classList.add("pasos-h");
    } else if (ultLetra == "s") {
        cuadros[posPers].classList.toggle("pers-abj");
        if (!iniciar) cuadros[posPers].classList.add("pasos-v");
    } else {
        cuadros[posPers].classList.toggle("pers-der");
        cuadros[posPers].classList.add("pasos-h");
    }
}

function comprobarMuros() {
    for (let i = 0; i < POSMUROS.length; i++){
        if (comprobarCuadro(POSMUROS[i]- 20) && comprobarCuadro(POSMUROS[i] - 19)) { //Comprobar arriba
            if (comprobarCuadro(POSMUROS[i] + 42) && comprobarCuadro(POSMUROS[i] + 43)) { //Comprobar abajo
                if (comprobarCuadro(POSMUROS[i] - 21) && comprobarCuadro(POSMUROS[i] - 1) && comprobarCuadro(POSMUROS[i] + 20) && comprobarCuadro(POSMUROS[i] + 41)) { //Comprobar columna izquierda
                    if (comprobarCuadro(POSMUROS[i] - 18) && comprobarCuadro(POSMUROS[i] + 3) && comprobarCuadro(POSMUROS[i] + 24) && comprobarCuadro(POSMUROS[i] + 44)) {
                        cuadros[POSMUROS[i]].classList.add("vacio");
                        cuadros[POSMUROS[i]].classList.add("muro");

                    }
                }
            }
        }
    }
}
function comprobarCuadro(pos) {
    if (cuadros[pos].classList.contains("pasos-v") || cuadros[pos].classList.contains("pasos-h")) {
        console.log("si");
        return true;
    }
    return false;
}