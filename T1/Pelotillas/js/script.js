let horas = 0;
let minutos = 0;
let segundos = 0;
let nPelotas;
window.onload = function() {
    pantalla = document.querySelectorAll("input")[0];
    cargarEventos();
}

function cargarEventos() {
    jugar.addEventListener("mouseup", sombra);
    jugar.addEventListener("mousedown", sombra);
    jugar.addEventListener("click",jugarJuego);
    uno.addEventListener("click", seleccionar);
    dos.addEventListener("click", seleccionar);
}
/**********************JUGAR***************************/

function jugarJuego() {
    cronometrar();
    nPelotas = obtenerNumero();
    let opcion = 1;
    if (!uno.classList.contains("seleccionado")) opcion = 2;
    centrar.remove();
    generarPelotas(nPelotas);
    
}
/**********************UTILIDADES***************************/

function sombra() {
    this.classList.toggle("sombra");
}
function seleccionar() {
    if (!this.classList.contains("seleccionado")) {
        uno.classList.toggle("seleccionado");
        dos.classList.toggle("seleccionado");
    }
}
function obtenerNumero(){
    let option = document.querySelectorAll("option");
    let nPelotas;
    option.forEach(e => {if (e.selected) nPelotas =  e.value;});
    return nPelotas;
}
function generarPelotas(nPelotas) {
    for (let i = 0; i < nPelotas; i++) {
        crearPelota();
    }
}
function crearPelota() {
    let pelotilla = document.createElement("div");
    pelotilla.classList.add("pelotilla");

    let px = Math.floor(Math.random() * 150);
    pelotilla.style.width = px + "px";
    pelotilla.style.height = px + "px";
    
    let left = Math.floor(Math.random() * 1400) + 20;
    let top = Math.floor(Math.random() * 550) + 90;
    pelotilla.style.left = left + "px";
    pelotilla.style.top = top + "px";
    pelotilla.style.borderRadius = "50%";
    let rojo = 100;
    let verde = 100;
    let azul = 100;
    pelotilla.style.backgroundColor = "red";
    pelotilla.addEventListener("dblclick", eliminarPelotilla);
    document.querySelectorAll(".gris")[0].append(pelotilla);
}


function eliminarPelotilla() {
    marcadorAzul.innerText++;
    if (marcadorAzul + marcadorRojo == nPelotas) {
        document.querySelectorAll(".gris")[0].innerText = "Has eliminado las " + nPelotas + "pelotillas en " + cronometro.innerText + "!!"
        cronometrar();
    }
    this.remove();   
}

/**********************CRONOMETRO***************************/
//Comienza a cronometrar
function cronometrar(){
    crearReloj();
    intervalo = setInterval(crearReloj,1000);
}

function crearReloj(){
    let hAux, mAux, sAux;
    segundos++;
    if (segundos>59) {
        minutos++;
        segundos=0;
    }
    if (minutos>59) {
        horas++;
        minutos=0;
    }
    if (horas>24) horas=0;
    if (segundos<10) sAux="0"+segundos;
    else sAux=segundos;
    if (minutos<10) mAux="0"+minutos;
    else mAux=minutos;
    if (horas<10) hAux="0"+horas;
    else hAux=horas;
    cronometro.innerText = hAux + ":" + mAux + ":" + sAux;
}
//Detiene el cronometro
function parar(){
    clearInterval(intervalo);
}