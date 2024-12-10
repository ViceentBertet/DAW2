let fila;

window.onload = function() {
    let primeraFila = document.getElementsByTagName("table")[0];
    cargarEventos(primeraFila);
    
    fila = primeraFila.cloneNode(true)
    let inputs = fila.querySelectorAll("input");
    inputs.forEach(e => e.value = "");
    
    mas.addEventListener("click", crearLinea);
}
function cargarEventos(fila) {
    let botones = fila.querySelectorAll(".boton");
    botones.forEach(e => {
        if (e.classList.contains("editar"))e.addEventListener("click",habilitarEdicion);
        else e.addEventListener("click", eliminar);
    });
}
function crearLinea() {
    let filaNueva = fila.cloneNode(true);
    main.appendChild(filaNueva);
    cargarEventos(filaNueva);

}
function habilitarEdicion() {
    let padre = this.parentNode.parentNode;
    let inputs = padre.querySelectorAll("input");
    inputs.forEach(e => e.disabled = false);
}
function eliminar() {
    let eliminar = true;
    let padre = this.parentNode.parentNode;
    let inputs = padre.querySelectorAll("input");
    let nom = padre.querySelectorAll(".nom")[0].value;
    let ape = padre.querySelectorAll(".ape")[0].value;
    let dni = padre.querySelectorAll(".dni")[0].value;

    inputs.forEach(e => {if (e.value == "") eliminar = false;});
    if (eliminar)
        if(confirm("¿Desea eliminar a " + nom + " " + ape + " con DNI " + dni + "?")) padre.remove(); 
}