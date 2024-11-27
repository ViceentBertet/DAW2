window.onload = function(){
    console.log();
    cargarEventos();
}
function cargarEventos() {
    let inputs = document.querySelectorAll('input');
    inputs.forEach((e) => {
        if (e.type == "button") e.addEventListener("click", cambiarPagina);
    });
}
function cambiarPagina() {
    if (this.value == "<") history.back();
    else if (this.value == ">") history.forward();
    else history.go(num.value);
}