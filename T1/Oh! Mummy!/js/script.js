let mandos = "wasd";
let cuadros;
let iniciar = true;
let posPers = 8;
let ultLetra = "s";
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
    cuadros = main.querySelectorAll("div");
    let fila = 0;
    let columna = 0;
    let pos = 0;
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
    cambiarAnterior();
    if (letra == "w") { //Arriba
        moverArriba();
    } else if (letra == "a"){ // Izquierda
        moverIzquierda();
    } else if (letra == "s"){ //Abajo
        moverAbajo();
    } else { // Derecha
        moverDerecha();
    }
}
function moverArriba() {
    if (!iniciar) {
        let newPos = posPers;
        if (posPers - 21 > -1) {
            newPos = posPers - 21;
        }
        if (cuadros[newPos].classList.contains("muro")) {
            newPos = posPers;
        }
        cuadros[newPos].classList.toggle("pers-arr");
        posPers = newPos;
    }
    ultLetra = "w";

}
function moverIzquierda() {
    if (!iniciar) {
        let newPos = posPers;
        if (posPers - 1 > -1) {
            newPos = posPers - 1;
        }
        if (cuadros[newPos].classList.contains("muro")) {
            newPos = posPers;
        }
        cuadros[newPos].classList.toggle("pers-izq");
        posPers = newPos;
    }
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
        iniciar = false;
    }
    ultLetra = "s";
}
function moverDerecha() {
    if (!iniciar) {
        let newPos = posPers;
        if (posPers + 1 < cuadros.length) {
            newPos = posPers + 1;
        }
        if (cuadros[newPos].classList.contains("muro")) {
            newPos = posPers;
        }
        cuadros[newPos].classList.toggle("pers-der");
        posPers = newPos;
    }
    ultLetra = "d";
}
function cambiarAnterior(){
    if (ultLetra == "w") cuadros[posPers].classList.toggle("pers-arr");
    else if (ultLetra == "a") cuadros[posPers].classList.toggle("pers-izq");
    else if (ultLetra == "s") cuadros[posPers].classList.toggle("pers-abj");
    else cuadros[posPers].classList.toggle("pers-der");
}