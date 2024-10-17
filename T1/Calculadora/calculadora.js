let pantalla;
let punto = false;
let operador = false;

validarCaracter(10);
window.onload = function() {
    pantalla = document.querySelectorAll("input")[0];
    cargarEventos();
}
function cargarEventos() {
    let botones = contenedor.querySelectorAll(".boton");
    botones.forEach(e => {
        e.addEventListener("mousedown",sombra);
        e.addEventListener("mouseup",sombra);
        e.addEventListener("click", anyadirNum);
        e.addEventListener()
    });
}
function sombra(){
    this.classList.toggle("sombra");
}
function anyadirNum() {
    let n = this.innerText;
    if (pantalla.value === "0") pantalla.value = n;
    else if (validarCaracter(n)){
        pantalla.value += n;
    }
}
function validarCaracter(n){
    if (!isNaN(n)) {
        operador = false;
        return true;
    } 
    if (tieneFuncion(n)) {
        return false;
    }
    if (!operador) {
        operador = true;
        return true;
    }
    return false;
}
function tieneFuncion(n) {
    if (n === "C") {
        punto = false;
        operador = false;
        pantalla.value = "0";
        return true;
    } 
    if (n === "( )") {
        if (!isNaN(pantalla.value[pantalla.value.length - 1])) {
            pantalla.value = "(" + pantalla.value +")";
        }
        return true;
    } 
    if (n === "«" || pantalla.value === "«") {
        if (pantalla.value[pantalla.value.length - 1] == ".") punto = false;
        if (isNaN(pantalla.value[pantalla.value.length - 1])) operador = false;
        if (pantalla.value.length > 1) {
            console.log(pantalla.value.length);
            pantalla.value = pantalla.value.substring(0, pantalla.value.length - 1);
            
        } else {
            pantalla.value = 0;
        }
        return true;
    } 
    if (n === ".") {
        if (!punto) {
            punto = true;
            pantalla.value += n;
        }
        return true;
    }
    if (n === "=") {
        /*
        No funciona:
                1. No detecta ()x la x despues de un parentesis
                2. % funciona para proporcionar un resto y no un porcentaje
        */
        pantalla.value = eval(pantalla.value.replace("x","*"));
        return true;
    } 
    return false;
    
}