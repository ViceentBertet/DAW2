let pantalla;
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
    if (n === "C") pantalla.value = "0";
    else if (n === "( )") pantalla.value = "(" + pantalla.value +")";
    else if (n === "«" || pantalla.value === "«") {
        if (pantalla.value.length > 1) {
            console.log(pantalla.value.length);
            pantalla.value = pantalla.value.substring(0, pantalla.value.length - 1);
            
        } else {
            pantalla.value = 0;
        }
        
    }  else if(pantalla.value === "0") pantalla.value = n;
    else pantalla.value += n;  
}