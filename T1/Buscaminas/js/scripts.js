let nBombas;
let casillas = [];
let acumulador = 0;
let clicks = 0;
window.onload = function() {
    empezar.addEventListener('click', jugar);
}

function jugar() {
    if (numMinas.value < 5 || numMinas.value > 50) error.innerText = "Tiene que ser un valor entre 5 y 50"
    else {
        nBombas = numMinas.value;
        borrarTablero();
        dibujarTablero();
        rellenarTablero();
    }
}
function borrarTablero() {
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
    for (let i = 0; i < 10; i++) {
        for (let j = 0; j < 10; j++){
            let content = matriz[i][j];
            /*
            Con la siguiente operación conseguimos saber que casilla 
            es la correspondiente con la matriz
            */
            let posCasillas = i * 10 + j;
            if (content == "x") {
                casillas[posCasillas].classList.add("mina");
            } else if (content != 0) {
                if (content == 1)
                    casillas[posCasillas].classList.add("poco");
                else if (content == 2)
                    casillas[posCasillas].classList.add("medio");
                else 
                    casillas[posCasillas].classList.add("mucho");
                casillas[posCasillas].innerText = content;
            }
        }
    }
}
function isX(n) {
    if (n == "x") return true;
    return false;
}
function buscarMina() {
    if (this.classList.contains('oculto')) {
        clicks++;
        this.classList.remove('oculto');
        if (!this.classList.contains("mina")) {
            let puntoActual = parseInt(this.innerText);
            if (isNaN(parseInt(this.innerText))) puntoActual = 0;
            acumulador += (puntoActual + 1) * nBombas;
            puntos.innerText = acumulador + "\npuntos"; 
        } else {
            pantallaFinal(false); 
        }
        
        if (clicks == (100 - nBombas)) {
            pantallaFinal(true);
        }
    }
}
function pantallaFinal(ganado) {
    let mensaje = "Has ganado con ";
    protector.classList.remove("ocultar");
    mensajeFinal.classList.remove("ocultar");
    if (!ganado)
        mensaje = "Has perdido con ";
        
    mensajeFinal.innerText = mensaje + puntos.innerText;
    let br = document.createElement("br");
    let boton = document.createElement("button");
    boton.id = "vuelta";
    boton.innerText = "Volver a jugar";
    mensajeFinal.appendChild(br);
    mensajeFinal.appendChild(boton);
    vuelta.addEventListener("click", volverJugar);
}
function volverJugar(){
    acumulador = 0;
    clicks = 0;
    protector.classList.add("ocultar");
    mensajeFinal.classList.add("ocultar");
    borrarTablero();
    let div1 = document.createElement("div");
    let div2 = document.createElement("div");
    let input = document.createElement("input");
    input.type = "number";
    input.id = "numMinas";
    let boton = document.createElement("button");
    boton.id = "empezar";
    boton.innerText = "Empezar";
    boton.addEventListener('click', jugar);
    div1.appendChild(input);
    div2.appendChild(boton);
    tablero.appendChild(div1);
    tablero.appendChild(div2);
}