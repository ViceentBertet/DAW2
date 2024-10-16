let pantalla;
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
        return true;
    } 
    if (isNaN(pantalla.value[pantalla.value.length])){
        return false;
    } 
    if (tieneFuncion(n)) {
        return false;
    } 
    return true;
}
function tieneFuncion(n) {
    if (n === "C") { 
        pantalla.value = "0";
        return true;
    } 
    if (n === "( )") { 
        pantalla.value = "(" + pantalla.value +")";
        return true;
    } 
    if (n === "«" || pantalla.value === "«") {
        if (pantalla.value.length > 1) {
            console.log(pantalla.value.length);
            pantalla.value = pantalla.value.substring(0, pantalla.value.length - 1);
            
        } else {
            pantalla.value = 0;
        }
        return true;
    } /*
    if (n === ".") {
        let ultimaPosicion = pantalla.value.lastIndexOf(".");
        if (ultimaPosicion === -1 && !isNaN(pantalla.value[pantalla.value.length])) {
            pantalla.value += n;
        } else if (isNaN(pantalla.value[pantalla.value.length])) return false;
        else {
            let linea = pantalla.value.substring(ultimaPosicion) + 1;
            for (let i = 0; i < linea.length;i++) {
                if (isNaN(linea[i]) && !linea[i + 1]) {

                }
            }
        }
        return true;
    }*/
    if (n === "=") {
        pantalla.value = eval(pantalla.value.replace("x","*"));
        return true;
    } 
    return false;
    
}