let isPlaying = false;
let isPreview = false;
let intervalo;
let intervaloAdd;
let duracionTotal = 0;
let contadorAdd = 5;
window.onload = function() {
    cargarEventos();
    add();
}
/** 
    Carga los eventos de todo el reproductor
*/
function cargarEventos() {
    /* Accion de los mandos */
    let btns = botones.querySelectorAll(".boton");
    btns[0].addEventListener("click", silenciar);
    btns[1].addEventListener("click", borrarTiempo);
    btns[2].addEventListener("click", iniciar);
    btns[3].addEventListener("click", anyadirTiempo);
    btns[4].addEventListener("click", reiniciar);
    btns[5].addEventListener("click", bajarVol);
    btns[6].addEventListener("click", subirVol);
    progreso.addEventListener("click", moverBarra);
    x.addEventListener("click", cerrarAdd);
    /* Acciones tactiles */
    izq.addEventListener("click", iniciar);
    der.addEventListener("click", iniciar);
    izq.addEventListener("dblclick", borrarTiempo);
    der.addEventListener("dblclick", anyadirTiempo);

    /* Estilo mandos */
    btns.forEach(e => {
        e.addEventListener("mousedown", sombra);
        e.addEventListener("mouseup", sombra);
    });
    repro.addEventListener("mouseover", oculto)
    repro.addEventListener("mouseout", oculto)
    barra.addEventListener("mouseover", oculto)
    barra.addEventListener("mouseout", oculto)
    botones.addEventListener("mouseover", oculto)
    botones.addEventListener("mouseout", oculto)
    tactil.addEventListener("mouseover", oculto)
    tactil.addEventListener("mouseout", oculto)
    
    /* Conf lista de videos */
    let videos = lista.querySelectorAll("video");
    videos.forEach(e => {
        e.addEventListener("click", cambiarPos);
        e.addEventListener("mouseover", verPreview);
        e.addEventListener("mouseout", verPreview);
    });
}
/**
    Sombra para los botones
*/
function sombra () {
    this.classList.toggle("sombra");
}
/**
    Utilidades de los botones
*/
function iniciar() {
    let video = repro.querySelectorAll("video")[0];
    play.classList.toggle("play");
    play.classList.toggle("pause");
    if (isPlaying) {
        video.pause();
        isPlaying = false;
        pararTiempo();
    } else {
        crearTiempo();
        video.play();
        isPlaying = true;
    }   
}
function silenciar() {
    let video = repro.querySelectorAll("video")[0];
    video.volume = 0;
}
function bajarVol() {
    let video = repro.querySelectorAll("video")[0];
    if (video.volume > 0) video.volume -= 0.1;
}
function subirVol() {
    let video = repro.querySelectorAll("video")[0];
    if (video.volume < 1) video.volume += 0.1;
}
function reiniciar() {
    let video = repro.querySelectorAll("video")[0];
    video.currentTime = 0;
    progreso.value = 0;
}
function borrarTiempo() {
    let video = repro.querySelectorAll("video")[0];
    if (video.currentTime > 10) video.currentTime -= 10;
    else video.currentTime = 0;
}
function anyadirTiempo() {
    let video = repro.querySelectorAll("video")[0];
    video.currentTime += 10;
}
/**
    Cambiar de posicion un video al reproductor y el
    anterior se pondra en la lista.
 */
function cambiarPos() {
    let videoCentral = repro.querySelectorAll("video")[0];
    let clonarVideo = videoCentral.cloneNode();
    clonarVideo.addEventListener("click", cambiarPos);
    clonarVideo.addEventListener("mouseover", verPreview);
    clonarVideo.addEventListener("mouseout", verPreview);
    lista.appendChild(clonarVideo);
    videoCentral.remove();
    let nuevoVideoCentral = this.cloneNode();

    repro.append(nuevoVideoCentral);

    if (isPlaying) {
        isPlaying = false;
        play.classList.toggle("play");
        play.classList.toggle("pause");
    }
    add();
    this.remove();
}
/** 
    Carga la barra de reproducción
*/
function cambiarDuracion() {
    let mAux, sAux;
    let videoCentral = repro.querySelectorAll("video")[0];
    let duracion = videoCentral.duration / 60;
    console.log(duracion);
    let min = Math.floor(parseFloat(duracion));
    let seg = Math.ceil((parseFloat(duracion) - min) * 60);
    if(min > 10) mAux = min;
    else mAux = "0" + min;
    if(seg > 10) sAux = seg;
    else sAux = "0" + seg;
    duracionTotal = mAux + ":" + sAux;
    texto.innerText = "00:00 / " + duracionTotal;
}
function crearTiempo() {
    intervalo = setInterval(barraRepro, 1000);
}
function barraRepro() {
    let mAux, sAux;
    let videoCentral = repro.querySelectorAll("video")[0];
    let duracion = videoCentral.currentTime/60;
    let min = Math.floor(parseFloat(duracion));
    let seg = Math.ceil((parseFloat(duracion) - min) * 60);
    if (min < 10) {
        mAux = "0" + min;
    } else mAux = min;
    if (seg < 10) {
        sAux = "0" + seg;
    } else sAux = seg;
    actual = mAux + ":" + sAux; 
    progreso.value = calcularPorcentaje();
    texto.innerText = actual + " / " + duracionTotal;
}
function calcularPorcentaje() {
    let videoCentral = repro.querySelectorAll("video")[0];
    return Math.ceil(videoCentral.currentTime * 100 / videoCentral.duration);
}
function pararTiempo() {
    clearInterval(intervalo);
}
/**
 * Mostrar o quitar barra de progreso y botones
 */
function oculto() {
    barra.classList.toggle("oculto");
    botones.classList.toggle("oculto");
    botones.classList.toggle("botonesActivos");
    tactil.classList.toggle("sombraReproductor");
}
/**
 * Mueve la barra y el tiempo de video dinamicamente
 * @param {*} evento Evento click para seleccionar donde hemos clicado
 */
function moverBarra(evento) {
    let video = repro.querySelectorAll("video")[0];
    let coord = evento.layerX - 10;
    let max = 779;
    let percen = Math.ceil(coord * 100 / max)
    progreso.value = percen;
    let newCurrentTime = Math.ceil(percen * video.duration / 100);
    video.currentTime = newCurrentTime;
}
/**
 * Crea un anuncio que bloquea la pantalla
 * con un contador de 10 segundos
 */
function add() {
    protector.classList.toggle("oculto");
    intervaloAdd = setInterval(countAdd, 1000);
}
function countAdd() {
    contadorAdd--;
    num.innerText = " " + contadorAdd + " ";
    if (contadorAdd == 0) {
        
        x.classList.toggle("oculto");
        cerrarContador();
    }
}
function cerrarContador() {
    clearInterval(intervaloAdd);
}
function cerrarAdd() {
    contadorAdd = 5;
    num.innerText = " " + contadorAdd + " ";
    protector.classList.toggle("oculto");
    x.classList.toggle("oculto");
    cambiarDuracion();
}

/**
 * Previsualizar un video de la lista
 */
function verPreview() {
    let poster = this.poster;
    if (!isPreview) {
        this.volume = 0;
        this.play();
        isPreview = true;
    } else {
        this.pause();
        this.currentTime = 0;
        this.volume = 1;
        isPreview = false;
    }
}

//Como puedo dejar el poster que habia antes?