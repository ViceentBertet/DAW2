window.onload = function() {
    cargarEventos();
}
function cargarEventos() {
    empezar.addEventListener('click', jugar);
}
function jugar() {
    if (numMinas.value < 5 || numMinas.value > 50) error.innerText = "Tiene que ser un valor entre 5 y 50"
    else {
        borrarMenu();
        dibujarTablero();
        ponerBombas();
    }
}
function borrarMenu() {
    let divs = tablero.querySelectorAll('div');
    divs.forEach(div => {
        div.remove();
    })
}
function dibujarTablero() {
    for (let i = 0; i < 100; i++) {
        let hijo = document.createElement('div');
        hijo.classList.add('casilla');
        hijo.classList.add('oculto');
        hijo.innerHTML = i;
        hijo.addEventListener('click', buscarMina);
        tablero.appendChild(hijo);
    }
}
function ponerBombas(){
    let matriz = Array.from({ length: 10 }, () => Array(10).fill(0));
    for (let fila of matriz) {
        console.log(fila);
    }
}
function buscarMina() {
    this.classList.remove('oculto');

}