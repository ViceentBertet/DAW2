let isPlaying = false;
window.onload = function() {
    cargarEventos();
}
function cargarEventos() {
    let btns = botones.querySelectorAll(".boton");
    btns[0].addEventListener("click", silenciar);
    btns[1].addEventListener("click", borrarTiempo);
    btns[2].addEventListener("click", iniciar);
    btns[3].addEventListener("click", anyadirTiempo);
    btns[4].addEventListener("click", reiniciar);
    btns[5].addEventListener("click", bajarVol);
    btns[6].addEventListener("click", subirVol);
    btns.forEach(e => {
        e.addEventListener("mousedown", sombra);
        e.addEventListener("mouseup", sombra);
    });
    let videos = document.querySelectorAll("video");
    videos.forEach(e => {
        e.addEventListener("click", cambiarPos);
    });
}

function sombra () {
    this.classList.toggle("sombra");
}
/*
    Inicia el programa y cambia el icono del boton
*/
function iniciar() {
    let video = repro.querySelectorAll("video")[0];
    this.classList.toggle("play");
    this.classList.toggle("pause");
    if (isPlaying) {
        video.pause();
        isPlaying = false;
    } else {
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
}
function borrarTiempo() {
    let video = repro.querySelectorAll("video")[0];
    video.currentTime -= 10;
}
function anyadirTiempo() {
    let video = repro.querySelectorAll("video")[0];
    video.currentTime += 10;
}
function cambiarPos() {
    let videoCentral = repro.querySelectorAll("video")[0];
    if (this != repro.querySelectorAll("video")[0]) {
        let clonarVideo = videoCentral.cloneNode();
        lista.appendChild(clonarVideo);
        videoCentral.remove();
        let nuevoVideoCentral = this.cloneNode();
        repro.append(nuevoVideoCentral);
        this.remove();
    }
}