let nBombas;
let casillas = [];
window.onload = function() {
    cargarEventos();
}
function cargarEventos() {
    empezar.addEventListener('click', jugar);
}
function jugar() {
    if (numMinas.value < 5 || numMinas.value > 50) error.innerText = "Tiene que ser un valor entre 5 y 50"
    else {
        nBombas = numMinas.value;
        borrarMenu();
        dibujarTablero();
        rellenarTablero();
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
        hijo.addEventListener('click', buscarMina);
        tablero.appendChild(hijo);
    }
    casillas = tablero.getElementsByTagName("div");
    
}
function rellenarTablero(){
    let matriz = Array.from({ length: 10 }, () => Array(10).fill(0));
    let posBombas = generarPosBombas();
    sustituirPosiciones(matriz,posBombas);
    for (let fila of matriz) {
        console.log(fila);
    }
    volcarTablero(matriz);
}
function generarPosBombas() {
    let array = [""];
    for (let i = 0; i < nBombas; i++) {
        let n = Math.floor(Math.random() * 100);
        if (!array.includes(n)){
            array[i] = n;
        } else {
            i--;
        }
    }
    console.log(array);
    return array;
}
/*
    Sustituye las posiciones de posBombas en matriz por "x"
    y suma en 1 las posiciones adyacentes a esta en caso de existir y que no sean minas
*/
function sustituirPosiciones(matriz, posBombas){
    for (let pos of posBombas) { 
        let row = Math.floor(pos / 10);
        let col = pos - row * 10;
        matriz[row][col] = "x";
        //Sumar columna de arriba
        if (row - 1 > -1 && col - 1 > -1) 
            if(!isX(matriz[row - 1][col - 1])) matriz[row - 1][col - 1]++;
        if (col - 1 > -1) 
            if (!isX(matriz[row][col - 1])) matriz[row][col - 1]++;
        if (row + 1 < 10 && col - 1 > -1) 
            if (!isX(matriz[row + 1][col - 1])) matriz[row + 1][col - 1]++;
        //Sumar columna del medio
        if (row - 1 > -1) 
            if (!isX(matriz[row - 1][col])) matriz[row - 1][col]++;
        if (row + 1 < 10) 
            if (!isX(matriz[row + 1][col])) matriz[row + 1][col]++;
        //Sumar columna de abajo
        if (row - 1 > -1 && col + 1 < 10)
            if (!isX(matriz[row - 1][col + 1])) matriz[row - 1][col + 1]++;
        if (col + 1 < 10)
            if (!isX(matriz[row][col + 1])) matriz[row][col + 1]++;
        if (row + 1 < 10 && col + 1 < 10) 
            if (!isX(matriz[row + 1][col + 1])) matriz[row + 1][col + 1]++;
    }
}
/*
    Volca toda la información de la matriz al tablero
    añadiendo las clases correspondientes
*/
function volcarTablero(matriz) {
    console.log(casillas);
    for (let i = 0; i < 10; i++) {
        for (let j = 0; i < 10; j++){
            
        }
    }
}
function isX(n) {
    if (n == "x") return true;
    return false;
}
function buscarMina() {
    this.classList.remove('oculto');
}