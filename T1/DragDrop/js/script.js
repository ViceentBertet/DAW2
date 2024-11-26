window.onload = function() {
    cargarEventos()
}

function cargarEventos() {
    contenedor1.addEventListener("dragover", admitirSoltar);
    contenedor2.addEventListener("dragover", admitirSoltar);
    contenedor1.addEventListener("drop", cambiarSitio);
    contenedor2.addEventListener("drop", cambiarSitio);
}
function cambiarSitio() {
    console.log("a");
    let img = document.querySelectorAll('img')[0];
    let clonarImg = img.cloneNode();
    this.appendChild(clonarImg);
    img.remove();
}
function admitirSoltar(ev) {
    ev.preventDefault(); //Permite dropear
}