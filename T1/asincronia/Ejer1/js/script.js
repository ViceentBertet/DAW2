let segundos = 0;
let idSegundos;
window.onload = function() {

    setTimeout(crearBoton, (1000 * getRandomInt(2,5)));
}
function getRandomInt(min, max) {
    min = Math.ceil(min);
    max = Math.floor(max);
    return Math.floor(Math.random() * (max - min + 1) + min);
}
function crearBoton() {
    idSegundos = setInterval(contarSegundos, 1000);
    let but = document.createElement("button");
    but.id="boton";
    but.innerText="Púlsame";
    but.style.top = getRandomInt(100,800) + "px";
    but.style.left = getRandomInt(100,800) + "px";
    document.body.appendChild(but);
    boton.addEventListener("click",parar);
}
function contarSegundos() {
    segundos++;
}
function parar() {
    alert("Has tardado: " + segundos + " segundos");
    clearInterval(idSegundos);
    setTimeout(crearBoton, (1000 * getRandomInt(2,5)));
    segundos = 0;
    this.remove();
}