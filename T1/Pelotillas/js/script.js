let horas = 0;
let minutos = 0;
let segundos = 0;
let nPelotas;
let opcion = 1;
let color = -1;
window.onload = function() {
    pantalla = document.querySelectorAll("input")[0];
    cargarEventos();
}

function cargarEventos() {
    document.querySelectorAll(".jugar")[0].addEventListener("mouseup", sombra);
    document.querySelectorAll(".jugar")[0].addEventListener("mousedown", sombra);
    document.querySelectorAll(".jugar")[0].addEventListener("click",jugarJuego);
    uno.addEventListener("click", seleccionar);
    dos.addEventListener("click", seleccionar);
}

/**********************JUGAR***************************/

function jugarJuego() {
    cronometrar();
    nPelotas = obtenerNumero();
    if (!uno.classList.contains("seleccionado")) opcion = 2;
    centrar.remove();
    
    if (opcion == 2){
        document.querySelectorAll(".jugar")[0].remove();
        color = Math.floor(Math.random() * 3);
        console.log(color);
        crearMenu();
    } else {
        generarPelotas(nPelotas);
        document.getElementsByClassName("jugar")[0].remove();

    }
}
function jugarColor() {
    document.getElementsByClassName("jugar")[0].remove();
    menu.remove();
    generarPelotas();
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
function generarPelotas() {
    if (opcion == 2) {
        let newPelotas = nPelotas / 2;
        console.log(nPelotas);
        for (let i = 0; i < newPelotas; i++) {
            crearPelotaColor();
        }
        for (let i = 0; i < newPelotas; i++) {
            crearPelotaAleatoria();
        }
    } else {
        for (let i = 0; i < nPelotas; i++) {
            crearPelotaAleatoria();
        }
    }
}
function crearPelotaAleatoria() {
    let r = 0;
    let g = 0;
    let b = 0;
    let pelotilla = document.createElement("div");
    pelotilla.classList.add("pelotilla");
    let px = Math.floor(Math.random() * 150);
    pelotilla.style.width = px + "px";
    pelotilla.style.height = px + "px";

    let left = Math.floor(Math.random() * 1780) + 20;
    let top = Math.floor(Math.random() * 550) + 90;
    pelotilla.style.left = left + "px";
    pelotilla.style.top = top + "px";

    if (color == 0) { //Color rojo
        g = Math.floor(Math.random() * 255);
        b = Math.floor(Math.random() * 255);
    } else if (color == 1) { //Color verde
        r = Math.floor(Math.random() * 255);
        b = Math.floor(Math.random() * 255);
    } else if (color == 2){ //Color azul
        r = Math.floor(Math.random() * 255);
        g = Math.floor(Math.random() * 255);
    } else {
        r = Math.floor(Math.random() * 255);
        g = Math.floor(Math.random() * 255);
        b = Math.floor(Math.random() * 255);
    }

    pelotilla.style.backgroundColor = "rgb(" + r + ", "+ g + "," + b +")";
    pelotilla.addEventListener("dblclick", eliminarPelotilla);
    document.querySelectorAll(".gris")[0].append(pelotilla);
}
function crearPelotaColor() {
    let pelotilla = document.createElement("div");
    pelotilla.classList.add("pelotilla");
    let px = Math.floor(Math.random() * 150);
    pelotilla.style.width = px + "px";
    pelotilla.style.height = px + "px";
    let left = Math.floor(Math.random() * 1780) + 20;
    let top = Math.floor(Math.random() * 550) + 90;
    pelotilla.style.left = left + "px";
    pelotilla.style.top = top + "px";
    if (color == 0) { //Color rojo
        pelotilla.classList.add("rojo");
    } else if (color == 1) { //Color verde
        pelotilla.classList.add("verde");
    } else if (color == 2){ //Color azul
        pelotilla.classList.add("azul");
    }
    pelotilla.addEventListener("dblclick", eliminarPelotilla);
    document.querySelectorAll(".gris")[0].append(pelotilla);
}
function eliminarPelotilla() {
    if (opcion == 1) marcadorAzul.innerText++;
    else {

        if (this.classList.contains("rojo") && color == 0) {
            marcadorAzul.innerText++
        } else if (this.classList.contains("verde") && color == 1){
            marcadorAzul.innerText++
        } else if (this.classList.contains("azul") && color == 2) {
            marcadorAzul.innerText++
        }else {
            marcadorRojo.innerText++;
        }
    }
    if (parseInt(marcadorAzul.innerText) == nPelotas && opcion == 1 || parseInt(marcadorAzul.innerText) == (nPelotas / 2) && opcion == 2) {
        parar();
        mostrarMensaje();
    }
    this.remove();   
}
function mostrarMensaje() {
    let tiempo = cronometro.innerText.split(":");
    if (parseInt(tiempo[0]) == 0 && parseInt(tiempo[1]) == 0){
        document.querySelectorAll(".gris")[0].innerText = "Has eliminado las " + parseInt(marcadorAzul.innerText) + " pelotillas en " + parseInt(tiempo[2]) + " segundos!!";
    } else if (parseInt(tiempo[0]) == 0){
        document.querySelectorAll(".gris")[0].innerText = "Has eliminado las " + parseInt(marcadorAzul.innerText) + " pelotillas en " + parseInt(tiempo[1]) + " minutos y " + parseInt(tiempo[2]) + " segundos!!";
    } else {
        document.querySelectorAll(".gris")[0].innerText = "Has eliminado las " + parseInt(marcadorAzul.innerText) + " pelotillas en " + parseInt(tiempo[0]) + " horas, " + parseInt(tiempo[1]) + " minutos y " + parseInt(tiempo[2]) + " segundos!!";
    }
}
function crearMenu() {
    let jugar = document.createElement("div");
    jugar.classList.add("jugar");
    jugar.innerText = "Jugar";
    jugar.addEventListener("click", jugarColor);
    let hijo = document.createElement("div");
    hijo.id = "menu";
    hijo.innerText = "Tiene que elimninar las pelotas de color:"
    document.querySelectorAll(".gris")[0].appendChild(hijo);
    document.querySelectorAll(".gris")[0].appendChild(jugar);
    let pelotilla = document.createElement("div");
    pelotilla.classList.add("mostrarBola");
    if (color == 0) {
        pelotilla.classList.add("rojo");
    } else if (color == 1){
        pelotilla.classList.add("verde");
    } else {
        pelotilla.classList.add("azul");
    }
    hijo.appendChild(pelotilla);
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