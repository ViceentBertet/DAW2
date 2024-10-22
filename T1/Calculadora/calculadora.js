let pantalla;
let punto = false;
let operador = false;
const OPERADORES = "+-/x%";

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
        e.addEventListener("click", teclaPulsada);
        document.addEventListener("keydown", teclaPulsada)
    });
}
function sombra(){
    this.classList.toggle("sombra");
}
function teclaPulsada(e) {
    console.log(e.key)
   if(e.key) anyadirNum(e.key);
   else anyadirNum(this.innerText);

}
function anyadirNum(n) {
    if (n === "Backspace" || n === "Delete") n = "«";
    if (n === "Enter") n = "=";
    if (n === "*") n = "x";

    if (pantalla.value === "0" && !isNaN(n)) pantalla.value = n;
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
    if (!operador && OPERADORES.includes(n)) {
        operador = true;
        punto = false;
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
        if (isNaN(pantalla.value[pantalla.value.length - 1])) {
            operador = false;
            if (pantalla.value.indexOf()){
                punto = true;
            }
        }
        if (pantalla.value.length > 1) {
            pantalla.value = pantalla.value.substring(0, pantalla.value.length - 1);
            
        } else {
            pantalla.value = 0;
        }
        return true;
    } 
    if (n == ".") {
        if (!punto) {
            punto = true;
            pantalla.value += n;
        }
        return true;
    }
    if (n === "=") {
        if (pantalla.value.indexOf("%")) {
            pantalla.value = pantalla.value.replaceAll("%", "x0.");
        }
        pantalla.value = eval(pantalla.value.replaceAll("x","*"));
        return true;
    }

    return false;
}