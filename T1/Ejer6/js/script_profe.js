
let fila;
window.onload = function() {
    //Recoger Fila
    fila = document.querySelector(".contenedor");
    cargarEventos(fila);
    cargarEventosMas();
}

function quitarSombra() {
    this.classList.toggle("sombra");
}

function cargarEventosMas() {
    mas.addEventListener("mousedown", quitarSombra);
    mas.addEventListener("mouseup", quitarSombra);
    mas.addEventListener("click", anyadir);
}

function cargarEventos(fila) {
    let botones = fila.querySelectorAll(".boton");
    botones.forEach((e) => {
        if (e.classList.contains("editar")) e.addEventListener("click", editar);
        else  e.addEventListener("click", eliminar);
    });
}

function editar() {
    let inputs = this.parentNode.querySelectorAll("input");
    inputs.forEach((e) => {
        e.disabled = false;
    })
}

function eliminar() {
    let ok = true;
    let dni;
    let inputs = this.parentNode.querySelectorAll("input");
    inputs.forEach((e) => {
        if(e.parentNode.innerText.trim() == ("DNI")) dni = e.value;
        if(e.value == "") {
            ok = false;
        }
    });

    if(ok) if(confirm("Desea eliminar al fulano con DNI " + dni)) this.parentNode.remove();
    else alert("Existen campos vacíos");
}

function anyadir() {
    let clon = fila.cloneNode(true);
    cargarEventos(clon);
    let inputs = clon.querySelectorAll("input");
    inputs.forEach((e) => e.value = "");
    document.getElementsByTagName("main")[0].appendChild(clon);
}